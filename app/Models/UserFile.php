<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserFile extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'file_type',
        'file_name',
        'file_original_name ',
        'file_size',
        'upload_progress',
        'upload_status'
    ];

    public function loadUserFiles($data,$requestData,$id){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = UserFile::leftjoin('user_file_folders','user_file_folders.id','user_files.folder_id')
                            ->where('user_file_folders.user_id', $loggedInUserId);
        if (!empty($id)) {
            $userData->where('folder_id',$id);
        }
        if(!empty($requestData['table_search_input'])){
            $searchData = $requestData['table_search_input'];
            $userData->where(function ($query) use($searchData){
                $query->Orwhere("user_files.file_original_name","LIKE","%".$searchData."%");
                $query->Orwhere("user_files.file_type","LIKE","%".$searchData."%");
            });
        }
        $userData->orderBy('user_files.created_at','desc');

        $userData->select('user_files.*');
        
        if(!empty($data['perPage'])){
            $results = $userData->groupBy('user_files.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $userData->count();
        }elseif(!empty($data['query'])){
            return $userData;
        }else{
            $results = $userData->groupBy('user_files.id')->get();
        }
        
        return $results; 
    }

    public function userFolder(){
        return $this->belongsTo(UserFileFolders::class,'folder_id','id');
      } 
}
