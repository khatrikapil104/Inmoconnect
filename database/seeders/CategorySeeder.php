<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // $categories = [
        //     ['name' => 'Buy to let'],
        //     ['name' => 'For Lease/Takeover'],
        //     ['name' => 'Investment'],
        //     ['name' => 'Luxury'],
        // ];

        $categories = [
            ['name' => 'Sale'],
            ['name' => 'Resale'],
            ['name' => 'New Development'],
            ['name' => 'Repossessions'],
            ['name' => 'Short Term Rental'],
            ['name' => 'Long Term Rental'],

        ];
        
        $newCategoryNames = array_column($categories, 'name');
        
        Category::whereNotIn('name', $newCategoryNames)->delete();

        foreach ($categories as $categoryData) {
            Category::updateOrCreate(['name' => $categoryData['name']], $categoryData);
        }
        
    }
}
