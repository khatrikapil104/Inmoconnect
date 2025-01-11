<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subtype;
use App\Models\TaskSubType;
use App\Models\TaskType;
use App\Models\Type;

class TaskSubTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtype = [
            //House
            ['name' => 'Kitchen', 'type' => 'House'],
            ['name' => 'Bedroom', 'type' => 'House'],
            ['name' => 'Balkani', 'type' => 'House'],
            ['name' => 'Room', 'type' => 'House'],   
            //Mall
            ['name' => 'Himalaya Mall', 'type' => 'Mall'],
            ['name' => 'Iscon Mall', 'type' => 'Mall'],
            ['name' => 'Acropolis Mall', 'type' => 'Mall'],
            ['name' => 'Pavilion Mall', 'type' => 'Mall'],   
            //Office
            ['name' => 'Govt. Office', 'type' => 'Office'],
            ['name' => 'IT Office', 'type' => 'Office'],
            ['name' => 'Private Office', 'type' => 'Office'],
            ['name' => 'Semi Govt. Office', 'type' => 'Office'],   
            //Store
            ['name' => 'Medical Store', 'type' => 'Store'],
            ['name' => 'General Store', 'type' => 'Store'],
            ['name' => 'Kasmatic Store', 'type' => 'Store'],
            ['name' => 'Provizion Store', 'type' => 'Store'],   
            //Plot
            ['name' => 'Bar Plot', 'type' => 'Plot'],
            ['name' => 'Pie Plot', 'type' => 'Plot'],
            ['name' => 'Squar Plot', 'type' => 'Plot'],
            ['name' => 'Mekko Plot', 'type' => 'Plot'],   
        ];
        $subTypeNames = array_column($subtype, 'name');
        
        $subTypeIds = [];
        foreach ($subtype as & $subtypeData) {
            $getTypeId = TaskType::where('name',$subtypeData['type'])->value('id');
            $subtypeData['task_id'] = $getTypeId ?? 0;
            unset($subtypeData['type']);
            
            $subTypeDetails = TaskSubType::where('name',$subtypeData['name'])->where('task_id',$getTypeId)->first();
            if(!empty($subTypeDetails)){
                $obj   = $subTypeDetails::find($subTypeDetails->id);
            }else{
                $obj   = new TaskSubType;
            }
            // dd($subtypeData['name'],$subtypeData['task_id']);
            $obj->name = $subtypeData['name'];
            $obj->task_id = $subtypeData['task_id'];
            $obj->save();
            $lastId = $obj->id;
            $subTypeIds[] = $lastId;
        }
        // print_r($subTypeIds);die;
        // Subtype::whereNotIn('id', $subTypeIds)->delete();
    }
}
