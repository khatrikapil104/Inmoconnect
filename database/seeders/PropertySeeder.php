<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\NewProperty;
use App\Models\PropertyFeature;
use App\Models\PropertyImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\PropertyFetch;
use File;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newProperty = NewProperty::factory()->count(10)->create();

        $faker = \Faker\Factory::create('es_ES');
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        foreach ($newProperty as $key => $poperty) {
            $features = Feature::all()->random(5);
            foreach ($features as $key => $feature) {
                foreach ($feature->subFeature->random(3) as $key => $sub_feature) {
                    $propeFeature = [
                        'property_id' => $poperty->id,
                        'feature_id' => $feature->id,
                        'sub_feature_id' => $sub_feature->id,
                    ];
                    PropertyFeature::create($propeFeature);
                }
            }

            for ($i = 0; $i < 4; $i++) {
                $fakeImg = $faker->imageUrl(width: 800, height: 600);

                $imageContent = file_get_contents($fakeImg);
                $fileName = 'property-image' . uniqid() . '.jpg';
                $localPath = Config('constant.PROPERTY_IMAGE_ROOT_PATH') . $fileName;
                file_put_contents(public_path($localPath), $imageContent);
                $propertyImage = [
                    'property_id' => $poperty->id,
                    'image' => $fileName,
                    'type' => 'image',
                ];
                PropertyImage::create($propertyImage);
            }
        }
    }
}