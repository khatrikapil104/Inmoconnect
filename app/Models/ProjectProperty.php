<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class ProjectProperty extends Model
{
    use HasFactory,SoftDeletes;

    public function loadProjectProperties($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $properties = ProjectProperty::leftJoin('properties','properties.id','project_properties.property_id');
        if(!empty($data['projectId'])){
            $properties->where('project_properties.project_id',$data['projectId']);
        }
        if(!empty($data['projectSlug'])){
            $properties->leftJoin('projects','projects.id','project_properties.project_id')->where('projects.slug',$data['projectSlug']);
        }
        if(!empty($requestData['sort_by_property'])){
            if($requestData['sort_by_property'] == 'high_low'){

                $properties->orderBy('properties.price','desc');
            }else if($requestData['sort_by_property'] == 'low_high'){
                $properties->orderBy('properties.price','asc');
            }else if($requestData['sort_by_property'] == 'newest'){
                $properties->orderBy('properties.created_at','desc');
            }else if($requestData['sort_by_property'] == 'oldest'){
                $properties->orderBy('properties.created_at','asc');
            }
        }else{
            $properties->orderBy('properties.created_at','desc');
        }

         
        if(!empty($requestData['search_input_property'])){
            $searchData = $requestData['search_input_property'];
            $properties->where(function ($query) use($searchData){
                $query->Orwhere("properties.name","LIKE","%".$searchData."%");
                $query->Orwhere("properties.reference","LIKE","%".$searchData."%");
                $query->Orwhere("properties.price",$searchData);
            });
        }
        // $properties->where('properties.owner_id')

        $properties->whereNull('properties.deleted_at')
            ->leftJoin('users', 'users.id', 'project_properties.added_by');
        
        if(!empty($data['perPage'])){
            $results = $properties->select('project_properties.id','project_properties.property_id','properties.reference','properties.name','properties.size','properties.price','properties.city', 'users.name as added_by_name', DB::raw('(SELECT type FROM property_images WHERE property_images.property_id = properties.id ORDER BY created_at LIMIT 1) AS firstImage_type'),
            DB::raw('(SELECT image FROM property_images WHERE property_images.property_id = properties.id ORDER BY created_at LIMIT 1) AS firstImage_image'), DB::raw('(SELECT name FROM types WHERE properties.type_id = types.id LIMIT 1) AS type_name'))->groupBy('project_properties.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $properties->count();
        }elseif(!empty($data['pluck'])){
            $results = $properties->pluck($data['pluck'])->toArray();
        }else{
            
            $results = $properties->select('project_properties.id','project_properties.property_id','properties.reference','properties.name','properties.size','properties.price','properties.city', 'users.name as added_by_name', DB::raw('(SELECT type FROM property_images WHERE property_images.property_id = properties.id ORDER BY created_at LIMIT 1) AS firstImage_type'),
            DB::raw('(SELECT image FROM property_images WHERE property_images.property_id = properties.id ORDER BY created_at LIMIT 1) AS firstImage_image'), DB::raw('(SELECT name FROM types WHERE properties.type_id = types.id LIMIT 1) AS type_name'))->groupBy('project_properties.id')->get();
        }
        
        return $results; 
    }

   
}
