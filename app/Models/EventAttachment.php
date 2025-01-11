<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;
class EventAttachment extends Model
{
    use HasFactory;


    public static function getNameAttribute($value = ""){    
        if($value != "" && File::exists(Config('constant.EVENT_ATTACHMENT_ROOT_PATH').$value)){
            $value = Config('constant.EVENT_ATTACHMENT_URL').$value;
        }else{
            $value = asset('img/default-user.jpg');
        }
        return $value;
    }
}
