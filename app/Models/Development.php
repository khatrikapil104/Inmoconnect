<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB,File;
class Development extends Model
{
    use HasFactory,SoftDeletes;

    const STATUS = [
        'under_construction' => "Under Construction",
        'running_late' => "Running Late"    
    ];
    public function loadDevelopments($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userDetails = !empty($data['userId']) ? User::find($data['userId']) : [];
        
        $results = Development::leftJoin('user_company_details','user_company_details.user_id',operator: 'developments.user_id');

        // dd($results->get());
        if(!empty($data['recordId'])){
            $results->where('developments.id',$data['recordId']);
        }
        
        if(!empty($data['userId'])){
            $results->where('developments.user_id',$data['userId'] );
        }

        
        $results->whereNull('developments.deleted_at');

        if (!empty($requestData['sortBy'])) {
            if ( $requestData['sortBy'] == 'price_asc') {
                $results->orderBy('developments.max_price', 'asc');
            } else if ( $requestData['sortBy'] == 'price_desc') {
                $results->orderBy('developments.max_price', 'desc');
            } else if ( $requestData['sortBy'] == 'last_update') {                                                                                                                          
                $results->orderBy('developments.updated_at', 'desc');
            } else if ($requestData['sortBy'] == 'newest') {
                $results->orderBy('developments.created_at', 'desc');
            } else if ($requestData['sortBy'] == 'oldest') {
                $results->orderBy('developments.created_at', 'asc');
            }
        } else {
            $results->orderBy('developments.created_at', 'desc');
        }
            
        
        if(!empty($data['perPage'])){
            $results = $results->groupBy('developments.id')->select('developments.*','user_company_details.company_name','user_company_details.company_image',DB::raw('(SELECT count(id) from properties WHERE development_id = developments.id AND owner_id = developments.user_id AND deleted_at is NULL) as total_units'),DB::raw("(SELECT count(id) from properties WHERE development_id = developments.id AND owner_id = developments.user_id AND status = 'sold' AND deleted_at is NULL) as total_units_sold",DB::raw('cover_image as cover_image_new')))->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $results->count();
        }elseif(!empty($data['pluck'])){
            $results = $results->pluck($data['pluck'])->toArray();
        }elseif(!empty($data['singleRecord'])){
            $results = $results->groupBy('developments.id')->select('developments.*','user_company_details.company_name','user_company_details.company_image',DB::raw('(SELECT count(id) from properties WHERE development_id = developments.id AND owner_id = developments.user_id AND deleted_at is NULL) as total_units'),DB::raw("(SELECT count(id) from properties WHERE development_id = developments.id AND owner_id = developments.user_id AND status = 'sold' AND deleted_at is NULL) as total_units_sold",DB::raw('cover_image as cover_image_new')))->first();
            
        }else{
            $results = $results->get();
        }

        if(!is_array($results) && !is_numeric($results) && (is_a($results, 'Illuminate\Database\Eloquent\Collection') ? $results->isNotEmpty() : !empty($results)) && !empty($requiredData) && empty($data['fetchCount']) && empty($data['pluck'])){
            if (!empty($data['singleRecord'])) {
                
            } else {
               
            }
        }
        
        return $results; 
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
    public static function getLegalDocumentAttribute($value = "")
    {
        if ($value != "" && File::exists(Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH') . $value)) {
            $value = Config('constant.DEVELOPMENT_IMAGE_URL') . $value;
        } else {
            $value = asset('img/default-property.jpg');
        }
        return $value;
    }
    public static function getBrochureAttribute($value = "")
    {
        if ($value != "" && File::exists(Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH') . $value)) {
            $value = Config('constant.DEVELOPMENT_IMAGE_URL') . $value;
        } else {
            $value = asset('img/default-property.jpg');
        }
        return $value;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
 
    
    public function developmentFloorPlan()
    {
        return $this->belongsTo(DevelopmentFloorPlan::class, 'id', 'development_id');
    }
}
