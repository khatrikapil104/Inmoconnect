<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            ['name' => 'Setting', 'icon' => 'icon-setting'],
            ['name' => 'Orientation', 'icon' => 'icon-orientation'],
            ['name' => 'Condition', 'icon' => ' icon-condition'],
            ['name' => 'Pool', 'icon' => 'icon-Pool'],
            ['name' => 'Climate Control', 'icon' => 'icon-climate_control'],
            ['name' => 'Views', 'icon' => 'icon-views'],
            ['name' => 'Feature', 'icon' => 'icon-Parking'],
            ['name' => 'Furniture', 'icon' => 'icon-features'],
            ['name' => 'Kitchen', 'icon' => 'icon-kitchen'],
            ['name' => 'Garden', 'icon' => 'icon-garden'],
            ['name' => 'Security', 'icon' => 'icon-security'],
            ['name' => 'Parking', 'icon' => 'icon-parking'],
            ['name' => 'Utilities', 'icon' => 'icon-utilities'],
            ['name' => 'Category', 'icon' => 'icon-category'],
        ];
        $newFeatureNames = array_column($features, 'name');
        
        Feature::whereNotIn('name', $newFeatureNames)->delete();

        foreach ($features as $featureData) {
            Feature::updateOrCreate(['name' => $featureData['name']], $featureData);
        }
       
    }
}