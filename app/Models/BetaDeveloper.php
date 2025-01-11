<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BetaDeveloper extends Model
{
    use HasFactory;

    public function loadBetaDeveloper($data,$requestData,$requiredData){
        $betaDeveloper = BetaDeveloper::query();
        if(!empty($requestData['table_search_input'])){
            $searchData = $requestData['table_search_input'];
            $betaDeveloper->where(function ($query) use($searchData){
                $query->Orwhere("name","LIKE","%".$searchData."%");
                $query->Orwhere("email","LIKE","%".$searchData."%");
                $query->Orwhere("phone","LIKE","%".$searchData."%");
                $query->Orwhere("country","LIKE","%".$searchData."%");
                $query->Orwhere("company_name","LIKE","%".$searchData."%");
            });
        }

        $betaDeveloper->whereNull('beta_developers.deleted_at')
            ->select('beta_developers.*')->groupBy('beta_developers.id');
        
        if(!empty($data['perPage'])){
            $results = $betaDeveloper->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $betaDeveloper->count();
        }else{
            $results = $betaDeveloper->get();
        }
        
        return $results; 
    }
}
