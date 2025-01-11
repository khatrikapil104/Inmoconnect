<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;
class PropertyImage extends Model
{
    use HasFactory;
    protected $fillable = ['property_id','image','is_active','type'
    ];
    public static function getImageAttribute($value = ""){    
        if($value != "" && File::exists(Config('constant.PROPERTY_IMAGE_ROOT_PATH').$value)){
            $value = Config('constant.PROPERTY_IMAGE_URL').$value;
        }else{
            $value = asset('img/default-property.jpg');
        }
        return $value;
    }

    public static function getImageWithoutAccessor($value = "")
    {
        $value = str_replace(Config('constant.PROPERTY_IMAGE_URL'),'',$value);
        return $value;
       
    }
}
