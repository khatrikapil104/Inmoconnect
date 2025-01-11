<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File,DB;
class userCompanyDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id ',
        'company_name',
        'company_email',
        'company_mobile',
        'company_tax_number',
        'company_website','company_address',
        'company_city',
        'company_sate',
        'company_country',
        'company_zipcode',
        'company_image',
        'primary_service_area',
        'professional_title',
        'property_types_specialized',
        'company_sub_agent',
        'total_properties_in_portfolio',
        'total_years_experiance',
        'number_of_current_customers',
        'avg_number_properties_managed',
        'property_specialization',
        'cif_nie',
    ];
    protected $table = 'user_company_details';

    public static function getCompanyImageAttribute($value = "")
    {
        if ($value != "" && File::exists(Config('constant.COMPANY_IMAGE_ROOT_PATH') . $value)) {
            $value = Config('constant.COMPANY_IMAGE_URL') . $value;
        } else if ($value != "" && File::exists(Config('constant.COMPANY_IMAGE_ROOT_PATH') . $value)) {
            $value = Config('constant.COMPANY_IMAGE_URL') . $value;
        } else {
            // $value = asset('img/default-user.jpg');
            $value = '';
        }
        return $value;
    }
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
    const number_of_sub_agents = [
        '1_10' => '1-10',
        '11_50' => '11-50',
        '50_more' => '50+'
    ];
}
