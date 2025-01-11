<?php

namespace App\Jobs;

use App\Models\Development;
use App\Models\FeedImportProgress;
use App\Models\Property;
use App\Models\Situation;
use App\Models\Subtype;
use App\Models\Type;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class XmlJobTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $feedurl;
    protected $loggedInUserId;
    protected $loggedInUserRole;

    /**
     * Create a new job instance.
     */
    public function __construct($feedurl, $loggedInUserId, $loggedInUserRole)
    {
        $this->feedurl = $feedurl;
        $this->loggedInUserId = $loggedInUserId;
        $this->loggedInUserRole = $loggedInUserRole;
        \Log::info('XML Feed Job Constructor ');
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            \Log::info('XML Feed Job Started');
            $response = Http::withOptions(['verify' => false])->timeout(120)->get($this->feedurl);

            if ($response->failed()) {
                \Log::info('XML Feed Job => Failed to fetch XML feed');
                return; // Exit early if the request failed
            }

            $xmlContent = $response->body();
            $xml = simplexml_load_string($xmlContent);

            if ($xml === false) {
                \Log::info('XML Feed Job => Invalid XML data');
                return;
            }

            \Log::info('XML Feed Job => Got XML Data');
            $existingReferences = Property::pluck('reference')->toArray();
            $xmlReferences = [];
            $processed_records = 0;
            $updated_records = 0;
            $inserted_records = 0;
            $deletedCount = 0;
            $development_id = Development::where('development_number', $xml->development->development_number)->value('id');

            foreach ($xml->property as $record) {
                foreach ($record->images->image as $img) {

                    $coverimg = basename($img->url);
                    \Log::info($coverimg);

                    if (!empty($img->url)) {
                        $fileName = $coverimg;
                        \Log::info($fileName);
                        $destinationPath = public_path('storage/properties/' . $fileName);
                        $imageContent = file_get_contents($img->url);
                        file_put_contents($destinationPath, $imageContent);
                 
                    }
                    break;
                }

                $typeId = Type::where('name', !empty($record->type) ? $record->type : null)->value('id');
                $situationId = Situation::where('name', !empty($record->property_information->situation_id) ? $record->property_information->situation_id : '')->value('id');
                $subtypeId = Subtype::where('name', !empty($record->property_information->subtype_id) ? $record->property_information->subtype_id : '')->value('id');


                $propertyData = [
                    'type_id' => !empty($typeId) ? $typeId : null,
                    'situation_id' => !empty($situationId) ? $situationId : null,
                    'subtype_id' => !empty($subtypeId) ? $subtypeId : null,
                    'reference' => (string) $record->ref,
                    'name' => (string) $record->id,
                    'bedrooms' => !empty($record->beds) ? (int) $record->beds : null,
                    'bathrooms' => !empty($record->baths) ? (int) $record->baths : null,
                    'status_completion' => $this->loggedInUserRole == 'agent' ? 'Completed' : (string) $record->property_information->status_completion,
                    'year' => !empty($record->property_information->year) ? (int) $record->property_information->year : null,
                    'owner_id' => $this->loggedInUserId,
                    'description' => (string) $record->desc->en,
                    'listed_as' => (string) $record->price_freq,
                    'price' => (float) $record->price,
                    'country' => (string) $record->country,
                    'state' => (string) $record->province,
                    'city' => (string) $record->town,
                    'latitude' => (string) $record->location->latitude,
                    'longitude' => (string) $record->location->longitude,
                    'size' => !empty($record->surface_area->plot) ? (int) $record->surface_area->plot : null,
                    'built' => !empty($record->surface_area->built) ? (int) $record->surface_area->built : null,
                    'cover_image' => (string) !empty($coverimg) ? $coverimg : null,
                    'development_id' => $development_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $xmlReferences[] = $propertyData['reference'];
                $existingProperty = Property::where('reference', $propertyData['reference'])->first();
                if ($existingProperty) {
                    $existingProperty->update($propertyData);
                    $updated_records++;
                } else {
                    Property::create($propertyData);
                    $inserted_records++;
                }
                $processed_records++;
            }

            $referencesNotInXml = array_diff($existingReferences, $xmlReferences);
            if (!empty($referencesNotInXml)) {
                Property::whereIn('reference', $referencesNotInXml)->where('owner_id', $this->loggedInUserId)->delete();
            }
            $deletedCount = count($referencesNotInXml);

            FeedImportProgress::updateOrCreate(
                ['url' => $this->feedurl, 'user_id' => $this->loggedInUserId],
                [
                    'status' => 'completed',
                    'processed_records' => $processed_records,
                    'inserted_records' => $inserted_records,
                    'updated_records' => $updated_records,
                    'progress' => 100,
                    'deleted_records' => $deletedCount,
                ]
            );

            \Log::info('XML Feed Job => Import Done');
        } catch (Exception $e) {
            \Log::info('XML Feed Job Errors => ' . $e->getMessage());
        }
    }
}
