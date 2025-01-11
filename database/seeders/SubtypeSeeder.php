<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subtype;
use App\Models\Type;

class SubtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtype = [
            ['name' => 'Ground Floor Apartment', 'type' => 'Apartment'],
            ['name' => 'Middle Floor Apartment', 'type' => 'Apartment'],
            ['name' => 'Top Floor Apartment', 'type' => 'Apartment'],
            ['name' => 'Penthouse', 'type' => 'Apartment'],
            ['name' => 'Penthouse Duplex', 'type' => 'Apartment'],
            ['name' => 'Duplex', 'type' => 'Apartment'],
            ['name' => 'Ground Floor Studio', 'type' => 'Apartment'],
            ['name' => 'Middle Floor Studio', 'type' => 'Apartment'],
            ['name' => 'Top Floor Studio', 'type' => 'Apartment'],

            ['name' => 'Detached Villa', 'type' => 'House'],
            ['name' => 'Semi-Detached House', 'type' => 'House'],
            ['name' => 'Townhouse', 'type' => 'House'],
            ['name' => 'Finca – Cortijo', 'type' => 'House'],
            ['name' => 'Bungalow', 'type' => 'House'],
            ['name' => 'Quad', 'type' => 'House'],
            ['name' => 'Castle', 'type' => 'House'],
            ['name' => 'City Palace', 'type' => 'House'],
            ['name' => 'Wooden Cabin', 'type' => 'House'],
            ['name' => 'Wooden House', 'type' => 'House'],
            ['name' => 'Mobile Home', 'type' => 'House'],
            ['name' => 'Cave House', 'type' => 'House'],

            ['name' => 'Residential Plot', 'type' => 'Plot'],
            ['name' => 'Commercial Plot', 'type' => 'Plot'],
            ['name' => 'Land', 'type' => 'Plot'],
            ['name' => 'Land with Ruin', 'type' => 'Plot'],
            ['name' => 'Bar', 'type' => 'Commercial'],
            ['name' => 'Restaurant', 'type' => 'Commercial'],
            ['name' => 'Café', 'type' => 'Commercial'],
            ['name' => 'Hotel', 'type' => 'Commercial'],
            ['name' => 'Hostel', 'type' => 'Commercial'],
            ['name' => 'Guest House', 'type' => 'Commercial'],
            ['name' => 'Bed and Breakfast', 'type' => 'Commercial'],
            ['name' => 'Shop', 'type' => 'Commercial'],
            ['name' => 'Office', 'type' => 'Commercial'],
            ['name' => 'Storage Room', 'type' => 'Commercial'],
            ['name' => 'Parking Space', 'type' => 'Commercial'],
            ['name' => 'Farm', 'type' => 'Commercial'],
            ['name' => 'Night Club', 'type' => 'Commercial'],
            ['name' => 'Warehouse', 'type' => 'Commercial'],
            ['name' => 'Garage', 'type' => 'Commercial'],
            ['name' => 'Business', 'type' => 'Commercial'],
            ['name' => 'Mooring', 'type' => 'Commercial'],
            ['name' => 'Stables', 'type' => 'Commercial'],
            ['name' => 'Kiosk', 'type' => 'Commercial'],
            ['name' => 'Chiringuito', 'type' => 'Commercial'],
            ['name' => 'Beach Bar', 'type' => 'Commercial'],
            ['name' => 'Mechanics', 'type' => 'Commercial'],
            ['name' => 'Hairdressers', 'type' => 'Commercial'],
            ['name' => 'Photography Studio', 'type' => 'Commercial'],
            ['name' => 'Laundry', 'type' => 'Commercial'],
            ['name' => 'Aparthotel', 'type' => 'Commercial'],
            ['name' => 'Apartment Complex', 'type' => 'Commercial'],
            ['name' => 'Residential Home', 'type' => 'Commercial'],
            ['name' => 'Vineyard', 'type' => 'Commercial'],
            ['name' => 'Olive Grove', 'type' => 'Commercial'],
            ['name' => 'Car Park', 'type' => 'Commercial'],
            ['name' => 'Commercial Premises', 'type' => 'Commercial'],
            ['name' => 'Campsite', 'type' => 'Commercial'],
            ['name' => 'With Residence', 'type' => 'Commercial'],
            ['name' => 'Other', 'type' => 'Commercial'],

            ['name' => 'Ranch-Style House', 'type' => 'Countryhouse'],
            ['name' => 'Colonial Architecture', 'type' => 'Countryhouse'],
            ['name' => 'Farmhouse', 'type' => 'Countryhouse'],
            ['name' => 'Tudor Architecture', 'type' => 'Countryhouse'],
            ['name' => 'Cottage', 'type' => 'Countryhouse'],
            ['name' => 'American Craftsman', 'type' => 'Countryhouse'],
            ['name' => 'Bunglow', 'type' => 'Countryhouse'],
            ['name' => 'Victoria House', 'type' => 'Countryhouse'],
            ['name' => 'Cape Code House', 'type' => 'Countryhouse'],
            ['name' => 'Container House', 'type' => 'Countryhouse'],
            ['name' => 'Mid century Modern', 'type' => 'Countryhouse'],
            ['name' => 'Modular Building', 'type' => 'Countryhouse'],
            ['name' => 'Greek Revival', 'type' => 'Countryhouse'],
            ['name' => 'French Country', 'type' => 'Countryhouse'],
            ['name' => 'Cabin', 'type' => 'Countryhouse'],
            ['name' => 'Split-Level', 'type' => 'Countryhouse'],

            ['name' => 'Ground Duplex', 'type' => 'Duplex'],
            ['name' => 'Standard Duplex', 'type' => 'Duplex'],
            ['name' => 'Low rise Duplex', 'type' => 'Duplex'],
            
            ['name' => 'Triplex Penthouse', 'type' => 'Penthouse'],
            ['name' => 'Luxury Penthouse', 'type' => 'Penthouse'],
            ['name' => 'Dual Key Duplex Penthouse', 'type' => 'Penthouse'],
            ['name' => 'Maisonette Style Duplex Penthouse', 'type' => 'Penthouse'],
            ['name' => 'Single Floor Plate Penthose', 'type' => 'Penthouse'],
            ['name' => 'High Ceiling Single floor', 'type' => 'Penthouse'],
            ['name' => 'Duplex Penthouse with Blank Roof Concept', 'type' => 'Penthouse'],
            ['name' => 'Duplex Penthouse with Two Floors of Liveable Space', 'type' => 'Penthouse'],
            
            ['name' => 'Rowhouse', 'type' => 'Townhouse'],
            ['name' => 'Stacked Townhouse', 'type' => 'Townhouse'],
            ['name' => 'Back to Back Townhouse', 'type' => 'Townhouse'],
            
            ['name' => 'Countryside Villa', 'type' => 'Villa'],
            ['name' => 'Urban Villa', 'type' => 'Villa'],
            ['name' => 'Luxury Villa', 'type' => 'Villa'],
            ['name' => 'Ecological Villa', 'type' => 'Villa'],
            ['name' => 'Modern Villa', 'type' => 'Villa'],
                    
        ];
        $subTypeNames = array_column($subtype, 'name');
        
        $subTypeIds = [];
        foreach ($subtype as &$subtypeData) {
            $getTypeId = Type::where('name',$subtypeData['type'])->value('id');
            $subtypeData['type_id'] = $getTypeId ?? 0;
            unset($subtypeData['type']);
            
            $subTypeDetails = SubType::where('name',$subtypeData['name'])->where('type_id',$getTypeId)->first();
            if(!empty($subTypeDetails)){
                $obj   = $subTypeDetails::find($subTypeDetails->id);
            }else{
                $obj   = new SubType;
            }
            
            $obj->name = $subtypeData['name'];
            $obj->type_id = $subtypeData['type_id'];
            $obj->save();
            $lastId = $obj->id;
            $subTypeIds[] = $lastId;
        }
        // print_r($subTypeIds);die;
        Subtype::whereNotIn('id', $subTypeIds)->delete();
    }
}
