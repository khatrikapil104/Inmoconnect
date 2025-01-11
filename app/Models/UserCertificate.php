<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;
class UserCertificate extends Model
{
    use HasFactory;


    public static function getCertificateAttribute($value = ""){    
        if($value != "" && File::exists(Config('constant.USER_CERTIFICATE_ROOT_PATH').$value)){
            $value = Config('constant.USER_CERTIFICATE_URL').$value;
        }else{
            $value = asset('img/default-user.jpg');
        }
        return $value;
    }
}
