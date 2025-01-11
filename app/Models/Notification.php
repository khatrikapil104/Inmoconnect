<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Notification extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'message',
        'is_read',
        'action_url',
        'created_at',
        'updated_at',
        'type',
        'reference_id',
        'values'
    ];

    
}
