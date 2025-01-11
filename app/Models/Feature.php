<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Feature extends Model
{
    use HasFactory;

    public function subFeature()
    {
        return $this->hasMany(SubFeature::class,'feature_id','id')->select('name', 'id', 'feature_id');
    }
}
