<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedSearchCretaria extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'search_name',
        'type',
        'search_data',
    ];
}
