<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;
class DevelopmentFloorPlan extends Model
{
    use HasFactory;

    public static function getImageAttribute($value = ""){    
        if($value != "" && File::exists(Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH').$value)){
            $value = Config('constant.DEVELOPMENT_IMAGE_URL').$value;
        }else{
            $value = asset('img/default-property.jpg');
        }
        return $value;
    }
}
