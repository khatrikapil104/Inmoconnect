<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Newsletter extends Model
{
    use HasFactory,SoftDeletes;

    public function loadNewsletters($data,$requestData,$requiredData){
        $newsletters = Newsletter::query();
        if(!empty($requestData['table_search_input'])){
            $searchData = $requestData['table_search_input'];
            $newsletters->where(function ($query) use($searchData){
                $query->Orwhere("newsletters.email","LIKE","%".$searchData."%");
            });
        }

        $newsletters->whereNull('newsletters.deleted_at')
            ->select('newsletters.*')->groupBy('newsletters.id');
        
        if(!empty($data['perPage'])){
            $results = $newsletters->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $newsletters->count();
        }else{
            $results = $newsletters->get();
        }
        
        return $results; 
    }

   
}
