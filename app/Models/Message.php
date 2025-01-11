<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Message extends Model
{
    use HasFactory,SoftDeletes;

    const MESSAGE_TYPE = [
        'chat' => 'chat',
        'comment' => 'comment',
        'custom' => 'custom'
    ];

}
