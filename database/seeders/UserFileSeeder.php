<?php

namespace Database\Seeders;

use App\Models\UserFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileData = [
            ['file_type' => 'pdf','file_name' => 'File 1','file_original_name' => 'File 1','file_size' => '5242880'],
            ['file_type' => 'jpg','file_name' => 'File 2','file_original_name' => 'File 2','file_size' => '1242880'],
            ['file_type' => 'png','file_name' => 'File 3','file_original_name' => 'File 3','file_size' => '2242880']
        ];
        $newLanguageLangCodes = array_column($fileData, 'file_name');
        
        UserFile::whereNotIn('file_name', $newLanguageLangCodes)->delete();

        foreach ($fileData as $file) {
            UserFile::updateOrCreate(['file_name' => $file['file_name']], $file);
        }
       
    }
}
