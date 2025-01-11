<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $types = [
        //     ['name' => 'Apartment'],
        //     ['name' => 'Apartment Duplex'],
        //     ['name' => 'Attached'],
        //     ['name' => 'Bar'],
        //     ['name' => 'Bars - Restaurants'],
        //     ['name' => 'Beach House'],
        //     ['name' => 'Bed and Breakfast'],
        //     ['name' => 'Building'],
        //     ['name' => 'Bungalow'],
        //     ['name' => 'Bush Home'],
        //     ['name' => 'Cabana'],
        //     ['name' => 'Cafe'],
        //     ['name' => 'Camping Park'],
        //     ['name' => 'Car Wash'],
        //     ['name' => 'Castle'],
        //     ['name' => 'Cave House'],
        //     ['name' => 'Chalet'],
        //     ['name' => 'Chateau'],
        //     ['name' => 'Coffee Shop'],
        //     ['name' => 'Commercial'],
        //     ['name' => 'Condo Hotel'],
        //     ['name' => 'Corner townhouse'],
        //     ['name' => 'Cortijo'],
        //     ['name' => 'Country House'],
        //     ['name' => 'Country Property'],
        //     ['name' => 'Deluxe Apartment'],
        //     ['name' => 'Detached villa'],
        //     ['name' => 'Duplex'],
        //     ['name' => 'Duplex Apartment'],
        //     ['name' => 'Duplex Townhouse'],
        //     ['name' => 'Duplex penthouse'],
        //     ['name' => 'Educational'],
        //     ['name' => 'Engineering'],
        //     ['name' => 'Equestrian Property'],
        //     ['name' => 'Farm'],
        //     ['name' => 'Farm House'],
        //     ['name' => 'Finca'],
        //     ['name' => 'Flat'],
        //     ['name' => 'Garage'],
        //     ['name' => 'Garden Apartment'],
        //     ['name' => 'Guest House'],
        //     ['name' => 'Hair and Beauty'],
        //     ['name' => 'Health and Fitness'],
        //     ['name' => 'Holiday Apartment'],
        //     ['name' => 'Holiday Home'],
        //     ['name' => 'Hostal'],
        //     ['name' => 'Hotel'],
        //     ['name' => 'House'],
        //     ['name' => 'Inland'],
        //     ['name' => 'Island'],
        //     ['name' => 'Land'],
        //     ['name' => 'Leisure'],
        //     ['name' => 'Lodging'],
        //     ['name' => 'Log/Mobile homes'],
        //     ['name' => 'Maisonette'],
        //     ['name' => 'Mansion'],
        //     ['name' => 'Manufacturing'],
        //     ['name' => 'Mooring'],
        //     ['name' => 'Office'],
        //     ['name' => 'Other'],
        //     ['name' => 'Penthouse'],
        //     ['name' => 'Plot'],
        //     ['name' => 'Quad House'],
        //     ['name' => 'Restaurant'],
        //     ['name' => 'Retail'],
        //     ['name' => 'Ruin'],
        //     ['name' => 'Semi-Detached'],
        //     ['name' => 'Services'],
        //     ['name' => 'Shop'],
        //     ['name' => 'Sports Bar'],
        //     ['name' => 'Storage'],
        //     ['name' => 'Studio'],
        //     ['name' => 'Studio Apartment'],
        //     ['name' => 'Studio Flat'],
        //     ['name' => 'Terraced House'],
        //     ['name' => 'Townhouse'],
        //     ['name' => 'Treehouse'],
        //     ['name' => 'Villa'],
        //     ['name' => 'Village house'],
        //     ['name' => 'Vineyard'],
        //     ['name' => 'Waterhomes'],
        //     ['name' => 'Wholesale/Distribution'],
        //     ['name' => 'Wooden House'],
        // ];

          $types = [
            ['name' => 'Apartment'],
            ['name' => 'House'],
            ['name' => 'Plot'],
            ['name' => 'Commercial'],
            ['name' => 'Countryhouse'],
            ['name' => 'Duplex'],
            ['name' => 'Penthouse'],
            ['name' => 'Townhouse'],
            ['name' => 'Villa'],
            ['name' => 'New Development'],
            
         
        ];
        $newTypeNames = array_column($types, 'name');
        
        Type::whereNotIn('name', $newTypeNames)->delete();

        foreach ($types as $typeData) {
            Type::updateOrCreate(['name' => $typeData['name']], $typeData);
        }
       
    }
}