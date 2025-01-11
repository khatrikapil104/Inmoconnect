<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['title' => 'English','lang_code' => 'en','folder_code' => 'en','image' => 'en_flag.png'],
            ['title' => 'Español','lang_code' => 'es','folder_code' => 'es','image' => 'es_flag.png'],
            ['title' => 'Français','lang_code' => 'fr','folder_code' => 'fr','image' => 'fr_flag.png'],
        ];
        $newLanguageLangCodes = array_column($languages, 'lang_code');
        
        Language::whereNotIn('lang_code', $newLanguageLangCodes)->delete();

        foreach ($languages as $languageData) {
            Language::updateOrCreate(['lang_code' => $languageData['lang_code']], $languageData);
        }
       
    }
}
