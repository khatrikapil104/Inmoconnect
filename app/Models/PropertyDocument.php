<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;
use Illuminate\Database\Eloquent\SoftDeletes;
class PropertyDocument extends Model
{
    use HasFactory,SoftDeletes;


    public static function getDocumentAttribute($value = ""){    
        if($value != "" && File::exists(Config('constant.PROPERTY_DOCUMENT_ROOT_PATH').$value)){
            $value = Config('constant.PROPERTY_DOCUMENT_URL').$value;
        }else{
            $value = asset('img/default-user.jpg');
        }
        return $value;
    }
}
