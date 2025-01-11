<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFileFolders extends Model
{
    use HasFactory;

    public function loadUserFolder($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = UserFileFolders::with('userFile')->where('user_id',$loggedInUserId);

        if(!empty($requestData['table_search_input'])){
            $searchData = $requestData['table_search_input'];
            $userData->where(function ($query) use($searchData){
                $query->Orwhere("name","LIKE","%".$searchData."%");
            });
        }
        $userData->orderBy('created_at','desc');

        $userData->select('user_file_folders.*');
        
        if(!empty($data['perPage'])){
            $results = $userData->groupBy('user_file_folders.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $userData->count();
        }elseif(!empty($data['query'])){
            return $userData;
        }else{
            $results = $userData->groupBy('user_file_folders.id')->get();
        }
        
        return $results; 
    }

    public function userFile()
    {
        return $this->hasMany(UserFile::class,'folder_id','id');
    }
}
