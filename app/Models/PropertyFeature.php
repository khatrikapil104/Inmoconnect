<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PropertyFeature extends Model
{
    use HasFactory;

    public function features()
    {
        return $this->hasMany(Feature::class, 'id','feature_id');
    }

}
