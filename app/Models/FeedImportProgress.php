<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedImportProgress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'url',
        'total_records',
        'status',
        'progress',
    ];
}
