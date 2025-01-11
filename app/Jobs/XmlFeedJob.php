<?php

namespace App\Jobs;

use App\Models\Development;
use App\Models\FeedImportProgress;
use App\Models\Property;
use App\Models\Situation;
use App\Models\Subtype;
use App\Models\Type;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class XmlFeedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $feedurl;
    protected $loggedInUserId;
    protected $loggedInUserRole;
    /**
     * Create a new job instance.
     */
    public function __construct($feedurl, $loggedInUserId,$loggedInUserRole)
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
            \Log::info('XML Feed Job Started ');
            $response = Http::withOptions(['verify' => false])->timeout(120)->get($this->feedurl);
            $xmlContent = $response->body();
            \Log::info('XML Feed Job => Got Xml Content ');
            $xml = simplexml_load_string($xmlContent);
            \Log::info('XML Feed Job => Got Xml Data ');
            \Log::info($this->loggedInUserRole);

            $currentPage = (int) $xml->pagination->page;
            $totalPages = (int) $xml->pagination->total_pages;
            $recordperpage = (int) $xml->pagination->per_page;
            $totalrecords = (int) $xml->pagination->total_items;
            $processed_records = 0;
            $updated_records = 0;
            $inserted_records = 0;
            $deletedCount = 0;
            $existingReferences = Property::pluck('reference')->toArray();
            $xmlReferences = [];
            $referencesNotInXml = [];
            $development_id = Development::where('development_number', $xml->development->development_number)->value('id');
            for ($i = 1; $i <= $totalPages; $i++) {
                $page = "page-" . $i;
                $url = str_replace("page-1", $page, $this->feedurl);
                $response = Http::withOptions(['verify' => false])->timeout(120)->get($url);

                if ($response->failed()) {
                    \Log::info('XML Feed Job => Failed to fetch XML feed');
                }
                ~$xmlContent = $response->body();
                $xml = simplexml_load_string($xmlContent);

                if ($xml === false) {
                    \Log::info('XML Feed Job => Invalid XML data');
                }
                foreach ($xml->properties->property as $record) {
                    $feedsValue = isset($record->property_information->feeds) ? ($record->property_information->feeds == 1 ? 1 : 0) : null;
                    $typeId = Type::where('name', !empty($record->property_information->property_type) ? $record->property_information->property_type : null)->value('id');
                    
                    if ($record->property_information->property_type == 'Plot') {
                        $bedrooms =  null;
                        $bathrooms = null;
                    }else{
                        $bedrooms =  (int)!empty($record->property_information->bedrooms) ? $record->property_information->bedrooms : null;
                        $bathrooms = (int)!empty($record->property_information->bathrooms) ? $record->property_information->bathrooms : null;
                    }
                    if ($this->loggedInUserRole == 'agent') {
                        $status_completion = 'Completed';
                    }else{
                        $status_completion = (string)!empty($record->property_information->status_completion) ? $record->property_information->status_completion : null;
                    }
                    
                    $situationId = Situation::where('name', !empty($record->property_information->situation_id) ? $record->property_information->situation_id : '')->value('id');
                    $subtypeId = Subtype::where('name', !empty($record->property_information->subtype_id) ? $record->property_information->subtype_id : '')->value('id');
                    $propertyData = [
                        //property_information 
                        'type_id' => !empty($typeId) ? $typeId : null,
                        'situation_id' => !empty($situationId) ? $situationId : null,
                        'subtype_id' => !empty($subtypeId) ? $subtypeId : null,
                        'reference' => (string)!empty($record->property_information->property_refrence) ? $record->property_information->property_refrence : null,
                        'name' =>   (string)!empty($record->property_information->property_title) ? $record->property_information->property_title : null,
                        'bedrooms' => $bedrooms,
                        'bathrooms' => $bathrooms,
                        'status_completion' => $status_completion,
                        'year' => (int)!empty($record->property_information->year) ? $record->property_information->year : null,
                        'owner_id' => (int)!empty($this->loggedInUserId) ? $this->loggedInUserId : null,
                        'feeds' => $feedsValue,
                        'description' => (string)!empty($record->property_information->description) ? $record->property_information->description : null,

                        //property_pricing
                        'listed_as' => (string)!empty($record->property_pricing->listed_as) ? $record->property_pricing->listed_as : null,
                        'percentage' => (float)!empty($record->property_pricing->percentage) ? $record->property_pricing->percentage : null,
                        'commission' => (float)!empty($record->property_pricing->commission) ? $record->property_pricing->commission : null,
                        'price' => (float)!empty($record->property_pricing->sale_price) ? $record->property_pricing->sale_price : null,
                        'net_price' => (float)!empty($record->property_pricing->net_price) ? $record->property_pricing->net_price : null,
                        'list_agent_per' => (float)!empty($record->property_pricing->list_agent_per) ? $record->property_pricing->list_agent_per : null,
                        'list_agent_com' => (float)!empty($record->property_pricing->list_agent_com) ? $record->property_pricing->list_agent_com : null,
                        'sell_agent_per' => (float)!empty($record->property_pricing->sell_agent_per) ? $record->property_pricing->sell_agent_per : null,
                        'sell_agent_com' => (float)!empty($record->property_pricing->sell_agent_com) ? $record->property_pricing->sell_agent_com : null,
                        'valuation' => (float)!empty($record->property_pricing->valuation) ? $record->property_pricing->valuation : null,
                        'valuation_year' => (int)!empty($record->property_pricing->valuation_year) ? $record->property_pricing->valuation_year : null,
                        'deed_value' => (float)!empty($record->property_pricing->deed_value) ? $record->property_pricing->deed_value : null,
                        'mini_price' => (float)!empty($record->property_pricing->mini_price) ? $record->property_pricing->mini_price : null,
                        'comm_fees' => (float)!empty($record->property_pricing->comm_fees) ? $record->property_pricing->comm_fees : null,
                        'garbage_tax' => (float)!empty($record->property_pricing->garbage_tax) ? $record->property_pricing->garbage_tax : null,
                        'ibi_fees' => (float)!empty($record->property_pricing->ibi_fees) ? $record->property_pricing->ibi_fees : null,
                        'commission_note' => (string)!empty($record->property_pricing->commission_note) ? $record->property_pricing->commission_note : null,

                        //property_location
                        'street_number' => (string)!empty($record->property_location->street_number) ? $record->property_location->street_number : null,
                        'street_name' => (string)!empty($record->property_location->street_name) ? $record->property_location->street_name : null,
                        'country' => (string)!empty($record->property_location->country) ? $record->property_location->country : null,
                        'state' => (string)!empty($record->property_location->state) ? $record->property_location->state : null,
                        'city' => (string)!empty($record->property_location->city) ? $record->property_location->city : null,
                        'zipcode' => (string)!empty($record->property_location->postcode) ? $record->property_location->postcode : null,
                        'address' => (string)!empty($record->property_location->address) ? $record->property_location->address : null,
                        'latitude' => (string)!empty($record->latitude) ? $record->latitude : null,
                        'longitude' => (string)!empty($record->longitude) ? $record->longitude : null,

                        //property_dimension
                        'dimension_type' => (string)!empty($record->property_dimensions->dimension_type) ? $record->property_dimensions->dimension_type : null,
                        'size' => (int)!empty($record->property_dimensions->total_size) ? $record->property_dimensions->total_size : null,
                        'floors' => (int)!empty($record->property_dimensions->floors) ? $record->property_dimensions->floors : null,
                        'built' => (int)!empty($record->property_dimensions->built) ? $record->property_dimensions->built : null,
                        'storeys' => (int)!empty($record->property_dimensions->storeys) ? $record->property_dimensions->storeys : null,
                        'no_of_properties_builtin' => (int)!empty($record->property_dimensions->no_of_properties_builtin) ? $record->property_dimensions->no_of_properties_builtin : null,
                        'terrace' => (int)!empty($record->property_dimensions->terrace) ? $record->property_dimensions->terrace : null,
                        'levels' => (int)!empty($record->property_dimensions->levels) ? $record->property_dimensions->levels : null,
                        'agency_ref' => (string)!empty($record->property_dimensions->agency_ref) ? $record->property_dimensions->agency_ref : null,
                        'garden_plot' => (int)!empty($record->property_dimensions->garden_plot) ? $record->property_dimensions->garden_plot : null,
                        'properties_int_floor_space' => (int)!empty($record->property_dimensions->properties_int_floor_space) ? $record->property_dimensions->properties_int_floor_space : null,
                        'co2_emission' => (float)!empty($record->property_dimensions->co2_emission) ? $record->property_dimensions->co2_emission : null,
                        'letter_co2' => (string)!empty($record->property_dimensions->letter_co2) ? $record->property_dimensions->letter_co2 : null,
                        'energy_consumption' => (float)!empty($record->property_dimensions->energy_consumption) ? $record->property_dimensions->energy_consumption : null,
                        'letter_energy' => (string)!empty($record->property_dimensions->letter_energy) ? $record->property_dimensions->letter_energy : null,

                        //document_info
                        'file' => (string)!empty($record->document_info->file) ? $record->document_info->file : null,
                        'nota_simple' => (string)!empty($record->document_info->nota_simple) ? $record->document_info->nota_simple : null,
                        'ibi_receipt' => (string)!empty($record->document_info->ibi_receipt) ? $record->document_info->ibi_receipt : null,
                        'first_occupancy_license_aFO' => (string)!empty($record->document_info->first_occupancy_license_aFO) ? $record->document_info->first_occupancy_license_aFO : null,

                        //company_info
                        'contact_name' => (string)!empty($record->company_info->contact_name) ? $record->company_info->contact_name : null,
                        'contact_email' => (string)!empty($record->company_info->contact_email) ? $record->company_info->contact_email : null,
                        'contact_mobile' => (string)!empty($record->company_info->contact_mobile) ? $record->company_info->contact_mobile : null,
                        'contact_tax_number' => (string)!empty($record->company_info->contact_tax_number) ? $record->company_info->contact_tax_number : null,
                        'contact_website' => (string)!empty($record->company_info->company_website) ? $record->company_info->company_website : null,
                        // 'company_address' => (string)$record->company_info->company_address : null,

                        //property_tour
                        'cover_image' => (string)!empty($record->property_media->cover_image) ? $record->property_media->cover_image : $record->property_media->property_images,
                        // 'properties_images' => (string)!empty($record->property_media->property_images) ? $record->property_media->property_images : null,
                        'virtual_tour' => (string)!empty($record->property_media->virtual_tour) ? $record->property_media->virtual_tour : null,
                        'video_tour' => (string)!empty($record->property_media->video_tour) ? $record->property_media->video_tour : null,

                        //property_features

                        //contact_information
                        'owner_one' => (string)!empty($record->contact_information->owner_one) ? $record->contact_information->owner_one : null,
                        'owner_two' => (string)!empty($record->contact_information->owner_two) ? $record->contact_information->owner_two : null,
                        'Key_holder' => (string)!empty($record->contact_information->Key_holder) ? $record->contact_information->Key_holder : null,
                        'developer' => (string)!empty($record->contact_information->developer) ? $record->contact_information->developer : null,
                        'key_status' => (string)!empty($record->contact_information->key_status) ? $record->contact_information->key_status : null,
                        'Key_id' => (string)!empty($$record->contact_information->Key_id) ? $record->contact_information->Key_id : null,
                        'key_details' => (string)!empty($record->contact_information->key_details) ? $record->contact_information->key_details : null,
                        'private_note' => (string)!empty($record->contact_information->private_note) ? $record->contact_information->private_note : null,
                        'lawyer' => (string)!empty($record->contact_information->lawyer) ? $record->contact_information->lawyer : null,
                        'development_id' => (int)!empty($development_id) ? $development_id : null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $xmlReferences[] = $propertyData['reference'];


                    // Log::info("Deleted $deletedCount records .");

                    $existingProperty = Property::where('reference', $propertyData['reference'])->first();
                    if (!empty($existingProperty)) {
                        $existingProperty->update($propertyData);
                        $updated_records++;
                    } else {
                        Property::create($propertyData);
                        $inserted_records++;
                    }
                    $processed_records++;
                }

                if ($processed_records == $totalrecords) {

                    $referencesNotInXml = array_diff($existingReferences, $xmlReferences);
                    if (!empty($referencesNotInXml)) {

                        Property::whereIn('reference', $referencesNotInXml)->where('owner_id', $this->loggedInUserId)->delete();
                    }
                }

                $deletedCount = (!empty($referencesNotInXml)) ? count($referencesNotInXml) : 0;

                $currentProgress = (($i * $recordperpage) * 100) / $totalrecords;
                $currentProgress = min($currentProgress, 100);

                $obj = FeedImportProgress::where('url', $this->feedurl)->where('user_id', $this->loggedInUserId)->first();

                if (empty($obj)) {
                    $obj = new FeedImportProgress();
                }

                $obj->user_id = $this->loggedInUserId;
                $obj->url = $this->feedurl;
                $obj->total_records = $totalrecords;
                if (($i) == $totalPages) {
                    $obj->status = "completed";
                } else {
                    $obj->status = "in process";
                }
                $obj->processed_records = $processed_records;
                $obj->inserted_records = $inserted_records;
                $obj->updated_records = $updated_records;
                $obj->progress = $currentProgress;
                $obj->deleted_records = $deletedCount;
                $obj->save();
            }

            \Log::info('XML Feed Job => Import Done ');
        } catch (Exception $e) {
            \Log::info('XML Feed Job Errors => ' . $e->getMessage());
        }
    }
}
