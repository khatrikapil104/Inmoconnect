<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserProfessionalInformation extends Model
{
    use HasFactory;
    const total_properties_in_portfolio = [
        '1_100' => '1-100',
        '101_1000' => '101-1000',
        '1000_more' => '1000+'
    ];
    const total_years_experiance = [
        '0_10' => '0-10 Years',
        '10_20' => '10-20 Years',
        '20_more' => '20+ Years'
    ];
    const number_of_current_customers = [
        '1_100' => '1-100',
        '101_500' => '101-500',
        '500_more' => '500+'
    ];
    const avg_number_properties_managed = [
        '1_100' => '1-100 Properties',
        '101_1000' => '101-1000 Properties',
        '1001_3000' => '1001-3000 Properties',
        '3000_more' => '3000+ Properties'
    ];

    protected $table = 'user_professional_informations';



}
