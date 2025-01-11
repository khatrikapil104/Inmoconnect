<?php

namespace Database\Seeders;

use App\Models\TaskType;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $types = [
            ['name' => 'House'],
            ['name' => 'Mall'],
            ['name' => 'Office'],
            ['name' => 'Store'],
            ['name' => 'Plot'],         
        ];
        $newTypeNames = array_column($types, 'name');
        
        TaskType::whereNotIn('name', $newTypeNames)->delete();

        foreach ($types as $typeData) {
            TaskType::updateOrCreate(['name' => $typeData['name']], $typeData);
        }
       
    }
}
