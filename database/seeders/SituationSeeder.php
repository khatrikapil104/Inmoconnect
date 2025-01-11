<?php

namespace Database\Seeders;

use App\Models\Situation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $situations = [
            ['name' => 'Golf'],
            ['name' => 'Island'],
            ['name' => 'Beach'],
            ['name' => 'Coast']
        ];
        $newSituationNames = array_column($situations, 'name');
        
        Situation::whereNotIn('name', $newSituationNames)->delete();

        foreach ($situations as $situationData) {
            Situation::updateOrCreate(['name' => $situationData['name']], $situationData);
        }
       
    }
}
