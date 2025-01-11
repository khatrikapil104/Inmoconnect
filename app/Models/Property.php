<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'reference',
    //     'owner_id ',
    //     'owner_name',
    //     'category_id',
    //     'type_id',
    //     'situation_id',
    //     'country_id',
    //     'state_id',
    //     'city_id',
    //     'vendor_name',
    //     'vendor_phone',
    //     'vendor_fax',
    //     'vendor_mobile',
    //     'vendor_email',
    //     'vendor_address',
    //     'street_number',
    //     'street_name',
    //     'zipcode',
    //     'notes',
    //     'address',
    //     'latitude',
    //     'longitude',
    //     'bedrooms',
    //     'bathrooms',
    //     'floors',
    //     'size',
    //     'price',
    //     'is_active'

    // ];
    protected $guarded = [];

    const STATUS = [
        'sold' => "Sold",
        'published' => "Published",
        'draft' => "Draft"
    ];
    const PROPERTY_FILTER_DATA_FORMAT = [
        'location' => ['name' => "location", "filter_name" => "Location"],
        'listed_as' => ['name' => "listed_as", "filter_name" => "Property Listed As"],
        'reference' => ['name' => "reference", "filter_name" => "Reference ID"],
        // 'price_range' => ['name' => "price_range", "filter_name" => "Price Range"],
        'type_id' => ['name' => "type_id", "filter_name" => "Property Type", 'reference_modal' => 'Type', 'reference_column_name' => 'name'],
        'subtype_id' => ['name' => "subtype_id", "filter_name" => "Property Subtype", 'reference_modal' => 'Subtype', 'reference_column_name' => 'name'],
        'situation_id' => ['name' => "situation_id", "filter_name" => "Property Situation", 'reference_modal' => 'Situation', 'reference_column_name' => 'name'],

        'subfeatures' => ['name' => "subfeatures", "filter_name" => "Property Amnesties", 'reference_modal' => 'Subfeature', 'reference_column_name' => 'name'],

        'listed_by' => ['name' => "listed_by", "filter_name" => "Listed By"],

        'bedrooms' => ['name' => 'bedrooms', "filter_name" => 'Bedrooms'],
        'bathrooms' => ['name' => 'bathrooms', "filter_name" => 'Bathrooms'],

        'status_completion' => ['name' => "status_completion", "filter_name" => "Property Status/Completion", 'reference_modal' => 'Subtype', 'reference_column_name' => 'name'],

        'year' => ['name' => 'year', "filter_name" => 'Completion Year'],
        'year_month' => ['name' => 'year_month', "filter_name" => 'Completion Year & Month'],
        'valuation_year' => ['name' => 'valution', "filter_name" => 'Valution Year'],
        'dimension_type' => ['name' => 'dimension_type', "filter_name" => 'Dimension Type'],
        'dimension_type' => ['name' => 'dimension_type', "filter_name" => 'Dimension Type'],
        'floors' => ['name' => 'floors', "filter_name" => 'Floors No.'],

        'commission_percentage' => [
            'name' => 'commission_percentage',
            'filter_name' => 'Commission Percentage',
            'minId' => 'min_percentage',
            'maxId' => 'max_percentage',
        ],
        'list_agent_commission' => [
            'name' => 'list_agent_commission',
            'filter_name' => 'List Agent Commission',
            'min_commission' => 'min_commission',
            'max_commission' => 'max_commission',
        ],
        'selling_agent_commission' => [
            'name' => 'selling_agent_commission',
            'filter_name' => 'Selling Agent Commission',
            'min_commission' => 'min_commission',
            'max_commission' => 'max_commission',
        ],
        'net_price' => [
            'name' => 'net_price',
            'filter_name' => 'Net Price',
            'min_net_price' => 'min_net_price',
            'max_net_price' => 'max_net_price',
        ],
        'price_range' => [
            'name' => 'price_range',
            'filter_name' => 'Price Range',
            'min_price' => 'min_price',
            'max_price' => 'max_price',
        ],
        'total_size' => [
            'name' => 'total_size',
            'filter_name' => 'Total Size',
            'min_size' => 'min_size',
            'max_size' => 'max_size',
        ],
        'valuation' => [
            'name' => 'valuation',
            'filter_name' => 'Valuation',
            'min_valuation' => 'min_valuation',
            'max_valuation' => 'max_valuation',
        ],
        'deed_value' => [
            'name' => 'deed_value',
            'filter_name' => 'Deed Value',
            'min_deed_value' => 'min_deed_value',
            'max_deed_value' => 'max_deed_value',
        ],
        'minimum_price' => [
            'name' => 'minimum_price',
            'filter_name' => 'Minimum Price',
            'min_price' => 'min_price',
            'max_price' => 'max_price',
        ],
        'community_fee' => [
            'name' => 'community_fee',
            'filter_name' => 'Community Fee (Per Month)',
            'min_community_fee' => 'min_community_fee',
            'max_community_fee' => 'max_community_fee',
        ],
        'garbage_tax' => [
            'name' => 'garbage_tax',
            'filter_name' => 'Garbage Tax (Per Year)',
            'min_garbage_tax' => 'min_garbage_tax',
            'max_garbage_tax' => 'max_garbage_tax',
        ],
        'ibi_fee' => [
            'name' => 'ibi_fee',
            'filter_name' => 'IBI Fees (Per Year)',
            'min_ibi_fees' => 'min_ibi_fees',
            'max_ibi_fees' => 'max_ibi_fees',
        ],
        'built_size' => [
            'name' => 'built_size',
            'filter_name' => 'Built',
            'min_built_size' => 'min_built_size',
            'max_built_size' => 'max_built_size',
        ],
        'terrace' => [
            'name' => 'terrace',
            'filter_name' => 'Terrace',
            'min_terrace' => 'min_terrace',
            'max_terrace' => 'max_terrace',
        ],
        'garden_plot' => [
            'name' => 'garden_plot',
            'filter_name' => 'Garden/Plot',
            'min_garden_plot' => 'min_garden_plot',
            'max_garden_plot' => 'max_garden_plot',
        ],
        'int_floor_space' => [
            'name' => 'int_floor_space',
            'filter_name' => 'Int. Floor Space',
            'min_int_floor_space' => 'min_int_floor_space',
            'max_int_floor_space' => 'max_int_floor_space',
        ],
        'storeys' => ['name' => 'storeys', "filter_name" => 'Storeys'],
        'no_of_properties_builtin' => ['name' => 'no_of_properties_builtin', "filter_name" => 'No. of Properties in Build in'],
        'levels' => ['name' => 'levels', "filter_name" => 'Levels'],
        'ageny_ref' => ['name' => 'ageny_ref', "filter_name" => 'Agency Ref'],
    ];



    // protected $fillable = [
    //     'situation_id',
    //     'type_id',
    //     'subtype_id',
    //     'subtype_id2',
    //     'reference',
    //     'name',
    //     'price',
    //     'owner_id',
    //     'owner_name',
    //     'bedrooms',
    //     'bathrooms',
    //     'status_completion',
    //     'year',
    //     'month',
    //     'description',
    //     'listed_as',
    //     'percentage',
    //     'commission',
    //     'list_agent_per',
    //     'list_agent_com',
    //     'sell_agent_per',
    //     'sell_agent_com',
    //     'note_com',
    //     'street_number',
    //     'street_name',
    //     'country',
    //     'state',
    //     'city',
    //     'zipcode',
    //     'address',
    //     'notes',
    //     'latitude',
    //     'longitude',
    //     'floors',
    //     'size',
    //     'plot_size',
    //     'built',
    //     'storeys',
    //     'no_of_properties_builtin',
    //     'terrace',
    //     'levels',
    //     'agency_ref',
    //     'garden_plot',
    //     'properties_int_floor_space',
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
    //     'freehold',
    //     'leasehold',
    //     'cover_image',
    //     'mini_price',
    //     'comm_fees',
    //     'garbage_tax',
    //     'ibi_fees',
    //     'dimension_type',
    //     'co2_emission',
    //     'letter_emi',
    //     'energy_consumption',
    //     'letter_energy',
    //     'owner_one',
    //     'owner_two',
    //     'key_holder',
    //     'developer',
    //     'key_status',
    //     'key_id',
    //     'key_details',
    //     'private_note',
    //     'lawyer',
    //     'video_tour',
    //     'virtual_tour',
    //     'status'
    // ];


    public function replicate(array $except = null)
    {
        $clone = parent::replicate($except);

        // Reset specific fields to their raw values
        $clone->cover_image =  $this->getAttributes()['cover_image'];

        return $clone;
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_features', 'property_id')
            ->withPivot('is_active');
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
        return $this->belongsTo(Subtype::class);
    }
    public function saveProperty()
    {
        return $this->hasOne(SavedProperties::class, 'property_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'owner_id','id');
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

    public static function getCoverImageWithoutAccessor($value = "")
    {
        $value = str_replace(Config('constant.PROPERTY_IMAGE_URL'),'',$value);
        return $value;
       
    }

    public function loadPropertiesByAgentId($data, $requestData)
    {
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $agentProperties = Property::with('type');
        if (!empty($requestData['sortBy'])) {
            if ($requestData['sortBy'] == 'high_low') {
                $agentProperties->orderBy('properties.price', 'desc');
            } else if ($requestData['sortBy'] == 'low_high') {
                $agentProperties->orderBy('properties.price', 'asc');
            } else if ($requestData['sortBy'] == 'newest') {
                $agentProperties->orderBy('properties.created_at', 'desc');
            } else if ($requestData['sortBy'] == 'oldest') {
                $agentProperties->orderBy('properties.created_at', 'asc');
            }
        } else {
            $agentProperties->orderBy('properties.created_at', 'desc');
        }

        if (!empty($requestData['table_search_input'])) {
            $searchData = $requestData['table_search_input'];
            $agentProperties->where(function ($query) use ($searchData) {
                $query->Orwhere("properties.name", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("properties.reference", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("properties.city", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("properties.price", "LIKE", "%" . $searchData . "%");
                $query->orWhereHas("type", function ($q) use ($searchData) {
                    $q->where('name', 'LIKE', "%" . $searchData . "%");
                });
            });
        }
        if (auth()->user()->role->name != 'superadmin' && auth()->user()->role->name != 'admin') {
            if (!empty($data['includeProjectProperties'])) {
                $agentProperties->where(function ($query) use ($data, $loggedInUserId) {
                    $query->where('properties.owner_id', $loggedInUserId)
                        ->orWhereIn('properties.id', $data['includeProjectProperties']);
                });
            } else {
                $agentProperties->where('properties.owner_id', $loggedInUserId);
            }
        }

        if (!empty($data['development_id'])) {
            $agentProperties->where('properties.development_id', $data['development_id']);
        }
        if (!empty($requestData['status'])) {
            $agentProperties->where('properties.status', $requestData['status']);
        }

        $agentProperties->leftJoin('users', 'users.id', 'properties.owner_id')->whereNull('properties.deleted_at')
            ->select('properties.*', 'users.name as agent_name', 'users.image as agentImage')->groupBy('properties.id');

        if (!empty($requestData['search_input_property'])) {

            if (!empty($data['perPage'])) {
                $results = $agentProperties->paginate($data['perPage']);
            } else {
                $results = $agentProperties->get();
            }
        } else if (!empty($requestData['sort_by_property'])) {
            if (!empty($data['perPage'])) {
                $results = $agentProperties->paginate($data['perPage']);
            } else {
                $results = $agentProperties->get();
            }
        } else if (!empty($data['perPage'])) {
            $results = $agentProperties->paginate($data['perPage']);
        } else {
            $results = $agentProperties->get();
        }
        return $results;
    }
}
