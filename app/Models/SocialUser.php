<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'provider_user_id',
        'provider_access_token',
        'provider_refresh_token'
    ];
}
