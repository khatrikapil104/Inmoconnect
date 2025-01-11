<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\SubFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subtype;
use App\Models\Type;

class SubFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subFeatures = [
            // Setting
            ['name' => 'Beachfront', 'type' => 'Setting'],
            ['name' => 'Village', 'type' => 'Setting'],
            ['name' => 'Close To Skiing', 'type' => 'Setting'],
            ['name' => 'Frontline Golf', 'type' => 'Setting'],
            ['name' => 'Mountain Pueblo', 'type' => 'Setting'],
            ['name' => 'Close To Forest', 'type' => 'Setting'],
            ['name' => 'Town', 'type' => 'Setting'],
            ['name' => 'Close To Golf', 'type' => 'Setting'],
            ['name' => 'Marina', 'type' => 'Setting'],
            ['name' => 'Suburban', 'type' => 'Setting'],
            ['name' => 'Close To Port', 'type' => 'Setting'],
            ['name' => 'Close To Marina', 'type' => 'Setting'],
            ['name' => 'Country', 'type' => 'Setting'],
            ['name' => 'Close To Shops', 'type' => 'Setting'],
            ['name' => 'Urbanization', 'type' => 'Setting'],
            ['name' => 'Commercial Area', 'type' => 'Setting'],
            ['name' => 'Close To Sea', 'type' => 'Setting'],
            ['name' => 'Front Line Beach Complex', 'type' => 'Setting'],
            ['name' => 'Beachside', 'type' => 'Setting'],
            ['name' => 'Close To Town', 'type' => 'Setting'],
            ['name' => 'Port', 'type' => 'Setting'],
            ['name' => 'close To Schools', 'type' => 'Setting'],
            // Orientation
            ['name' => 'North', 'type' => 'Orientation'],
            ['name' => 'North East', 'type' => 'Orientation'],
            ['name' => 'East', 'type' => 'Orientation'],
            ['name' => 'South East', 'type' => 'Orientation'],
            ['name' => 'South', 'type' => 'Orientation'],
            ['name' => 'South West', 'type' => 'Orientation'],
            ['name' => 'West', 'type' => 'Orientation'],
            ['name' => 'North West', 'type' => 'Orientation'],

            // Condition
            ['name' => 'Excellent', 'type' => 'Condition'],
            ['name' => 'Good', 'type' => 'Condition'],
            ['name' => 'Fair', 'type' => 'Condition'],
            ['name' => 'Renovation Required', 'type' => 'Condition'],
            ['name' => 'Recently Refurbished', 'type' => 'Condition'],
            ['name' => 'Restoration Required', 'type' => 'Condition'],
            ['name' => 'New Construction', 'type' => 'Condition'],

             // Pool
             ['name' => 'Communal', 'type' => 'Pool'],
             ['name' => 'Private', 'type' => 'Pool'],
             ['name' => 'Indoor', 'type' => 'Pool'],
             ['name' => 'Heated', 'type' => 'Pool'],
             ['name' => 'Room For Pool', 'type' => 'Pool'],
             ['name' => 'Children`s Pool', 'type' => 'Pool'],

             // Climate Control
             ['name' => 'Air Conditioning', 'type' => 'Climate Control'],
             ['name' => 'Pre Installed A/C', 'type' => 'Climate Control'],
             ['name' => 'Hot A/C', 'type' => 'Climate Control'],
             ['name' => 'Cold A/C', 'type' => 'Climate Control'],
             ['name' => 'Central Heating', 'type' => 'Climate Control'],
             ['name' => 'Fireplace', 'type' => 'Climate Control'],
             ['name' => 'U/F Heating', 'type' => 'Climate Control'],
             ['name' => 'U/F/H Bathrooms', 'type' => 'Climate Control'],

             // Views
             ['name' => 'Sea', 'type' => 'Views'],
             ['name' => 'Mountain', 'type' => 'Views'],
             ['name' => 'Golf', 'type' => 'Views'],
             ['name' => 'Beach', 'type' => 'Views'],
             ['name' => 'Port', 'type' => 'Views'],
             ['name' => 'Country', 'type' => 'Views'],
             ['name' => 'Panoramic', 'type' => 'Views'],
             ['name' => 'Garden', 'type' => 'Views'],
             ['name' => 'Pool', 'type' => 'Views'],
             ['name' => 'Courtyard', 'type' => 'Views'],
             ['name' => 'Lake', 'type' => 'Views'],
             ['name' => 'Urban', 'type' => 'Views'],
             ['name' => 'Ski', 'type' => 'Views'],
             ['name' => 'Forest', 'type' => 'Views'],
             ['name' => 'Street', 'type' => 'Views'],

             // Views
             ['name' => 'Covered Terrace', 'type' => 'Feature'],
             ['name' => 'Lift', 'type' => 'Feature'],
             ['name' => 'Fitted Wardrobes', 'type' => 'Feature'],
             ['name' => 'Near Transport', 'type' => 'Feature'],
             ['name' => 'Private Terrace', 'type' => 'Feature'],
             ['name' => 'Solarium', 'type' => 'Feature'],
             ['name' => 'Satellite TV', 'type' => 'Feature'],
             ['name' => 'WiFi', 'type' => 'Feature'],
             ['name' => 'Gym', 'type' => 'Feature'],
             ['name' => 'Sauna', 'type' => 'Feature'],
             ['name' => 'Games Room', 'type' => 'Feature'],
             ['name' => 'Paddle Tennis', 'type' => 'Feature'],
             ['name' => 'Tennis Court', 'type' => 'Feature'],
             ['name' => 'Guest Apartment', 'type' => 'Feature'],
             ['name' => 'Guest House', 'type' => 'Feature'],
             ['name' => 'Storage Room', 'type' => 'Feature'],
             ['name' => 'Utility Room', 'type' => 'Feature'],
             ['name' => 'Ensuite Bathroom', 'type' => 'Feature'],
             ['name' => 'Wood Flooring', 'type' => 'Feature'],
             ['name' => 'Marble Flooring', 'type' => 'Feature'],
             ['name' => 'Jacuzzi', 'type' => 'Feature'],
             ['name' => 'Bar', 'type' => 'Feature'],
             ['name' => 'Barbeque', 'type' => 'Feature'],
             ['name' => 'Double Glazing', 'type' => 'Feature'],
             ['name' => 'Domotics', 'type' => 'Feature'],
             ['name' => '24 Hour Reception', 'type' => 'Feature'],
             ['name' => 'Restaurant On Site', 'type' => 'Feature'],
             ['name' => 'Car Hire Facility', 'type' => 'Feature'],
             ['name' => 'Courtesy Bus', 'type' => 'Feature'],
             ['name' => 'Day Care', 'type' => 'Feature'],
             ['name' => 'Near Mosque', 'type' => 'Feature'],
             ['name' => 'Staff Accommodation', 'type' => 'Feature'],
             ['name' => 'Stables', 'type' => 'Feature'],
             ['name' => 'Near Church', 'type' => 'Feature'],
             ['name' => 'Basement', 'type' => 'Feature'],
             ['name' => 'Fiber Optic', 'type' => 'Feature'],
             ['name' => 'Access for people with reduced mobility', 'type' => 'Feature'],

              // Kitchen
              ['name' => 'Fully Furnished', 'type' => 'Furniture'],
              ['name' => 'Part Furnished', 'type' => 'Furniture'],
              ['name' => 'Not Furnished', 'type' => 'Furniture'],
              ['name' => 'Optional', 'type' => 'Furniture'],

              // Furniture
              ['name' => 'Fully Fitted', 'type' => 'Kitchen'],
              ['name' => 'Partially Fitted', 'type' => 'Kitchen'],
              ['name' => 'Not Fitted', 'type' => 'Kitchen'],
              ['name' => 'Kitchen-Lounge', 'type' => 'Kitchen'],

              // Garden
              ['name' => 'Communal', 'type' => 'Garden'],
              ['name' => 'Private', 'type' => 'Garden'],
              ['name' => 'Landscaped', 'type' => 'Garden'],
              ['name' => 'Easy Maintenance', 'type' => 'Garden'],

              // Security
              ['name' => 'Gated Complex', 'type' => 'Security'],
              ['name' => 'Electric Blinds', 'type' => 'Security'],
              ['name' => 'Entry Phone', 'type' => 'Security'],
              ['name' => 'Alarm System', 'type' => 'Security'],
              ['name' => '24 Hour Security', 'type' => 'Security'],
              ['name' => 'Safe', 'type' => 'Security'],

               // Parking
               ['name' => 'Underground', 'type' => 'Parking'],
               ['name' => 'Garage', 'type' => 'Parking'],
               ['name' => 'Covered', 'type' => 'Parking'],
               ['name' => 'Open', 'type' => 'Parking'],
               ['name' => 'Street', 'type' => 'Parking'],
               ['name' => 'More Than One', 'type' => 'Parking'],
               ['name' => 'Communal', 'type' => 'Parking'],
               ['name' => 'Private', 'type' => 'Parking'],
               ['name' => 'EV charge point', 'type' => 'Parking'],

                // Utilities
                ['name' => 'Electricity', 'type' => 'Utilities'],
                ['name' => 'Drinkable Water', 'type' => 'Utilities'],
                ['name' => 'Telephone', 'type' => 'Utilities'],
                ['name' => 'Gas', 'type' => 'Utilities'],
                ['name' => 'Photovoltaic solar panels', 'type' => 'Utilities'],
                ['name' => 'Solar water heating', 'type' => 'Utilities'],

                 // Category
               ['name' => 'Bargain', 'type' => 'Category'],
               ['name' => 'Beachfront', 'type' => 'Category'],
               ['name' => 'Cheap', 'type' => 'Category'],
               ['name' => 'Distressed', 'type' => 'Category'],
               ['name' => 'Golf', 'type' => 'Category'],
               ['name' => 'Holiday Homes', 'type' => 'Category'],
               ['name' => 'Investment', 'type' => 'Category'],
               ['name' => 'Luxury', 'type' => 'Category'],
               ['name' => 'Off Plan', 'type' => 'Category'],
               ['name' => 'Reduced', 'type' => 'Category'],
               ['name' => 'Repossession', 'type' => 'Category'],
               ['name' => 'Resale', 'type' => 'Category'],
               ['name' => 'With Planning Permission', 'type' => 'Category'],
               ['name' => 'Contemporary', 'type' => 'Category'],
               ['name' => 'New Development', 'type' => 'Category'],
      
        ];
        
        $subFetureIds = [];
        foreach ($subFeatures as & $subFeaturesData) {
            $getFetureId = Feature::where('name',$subFeaturesData['type'])->value('id');
            
            $subFeaturesData['feature_id'] = $getFetureId ?? 0;
            unset($subFeaturesData['type']);
            
            $subFeatureDetails = SubFeature::where('name',$subFeaturesData['name'])->where('feature_id',$getFetureId)->first();

            if(!empty($subFeatureDetails)){
                $obj   = $subFeatureDetails::find($subFeatureDetails->id);
            }else{
                $obj   = new SubFeature;
            }
            $obj->name = $subFeaturesData['name'];

            $obj->feature_id = $subFeaturesData['feature_id'];
            $obj->save();
            $lastId = $obj->id;
            $subFetureIds[] = $lastId;
        }
        // print_r($subTypeIds);die;
        SubFeature::whereNotIn('id', $subFetureIds)->delete();
    }
}
