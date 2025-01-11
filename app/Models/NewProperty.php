<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class NewProperty extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'properties';
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'description',
    //     'reference',
    //     'subtype_id',
    //     'category_id',
    //     'type_id',
    //     'situation_id',
    //     'country_id',
    //     'state_id',
    //     'city_id',
    //     'country',
    //     'state',
    //     'city',
    //     'totle_size',
    //     'plot_size',
    //     'built',
    //     'storeys',
    //     'no_of_properties_in_buildin',
    //     'terrace',
    //     'levels',
    //     'agency_ref',
    //     'garden_plot',
    //     'int_floor_space',
    //     'long_term_ref',
    //     'short_term_ref',
    //     'rental_license_ref',
    //     'nota_simple',
    //     'IBI_receipt',
    //     'first_occupancy_license_aFO',
    //     'contact_name',
    //     'contact_email',
    //     'contact_mobile',
    //     'contact_street_address',
    //     'contact_city',
    //     'contact_state_province',
    //     'contact_country',
    //     'contact_zipcode',
    //     'company_name',
    //     'street_number',
    //     'street_name',
    //     'zipcode',
    //     'notes',
    //     'address',
    //     'file',
    //     'cover_image',
    //     'latitude',
    //     'longitude',
    //     'bedrooms',
    //     'bathrooms',
    //     'floors',
    //     'price',
    //     'is_active'

    // ];

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_features','property_id','feature_id')
                    ->withPivot('is_active');
    }

    public function subFeatures()
    {
        return $this->belongsToMany(SubFeature::class, 'property_features', 'property_id', 'sub_feature_id');
    }
    public function propertyFeature()
    {
        return $this->belongsTo(PropertyFeature::class, 'id','property_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }
    public function firstImage()
    {
        return $this->hasOne(PropertyImage::class)->orderBy('created_at', 'asc');
    }
    public function subtype()
    {
        return $this->belongsTo(Subtype::class);
    }
    public function subtype2()
    {
        return $this->belongsTo(Subtype::class,'subtype_id2','id');
    }

    public static function getCoverImageAttribute($value = "")
    {
        if ($value != "" && File::exists(Config('constant.PROPERTY_IMAGE_ROOT_PATH') . $value)) {
            $value = Config('constant.PROPERTY_IMAGE_URL') . $value;
        } else {
            $value = asset('img/default-property.jpg');
        }
        return $value;
    }
}