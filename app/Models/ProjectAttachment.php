<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectAttachment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'project_id',
        'file_id',
        'added_by'
    ];

    public function loadProjectAttachments($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        
        $userData = ProjectAttachment::with('projectAttachment.userFolder')->leftJoin('user_files','project_attachments.file_id','user_files.id')->leftJoin('users','users.id','project_attachments.added_by');
        if(!empty($data['projectId'])){
            $userData->where('project_attachments.project_id',$data['projectId']);
        }

        if(!empty($requestData['search_input_attachment'])){
            $searchData = $requestData['search_input_attachment'];
            $userData->where(function ($query) use($searchData){
                $query->Orwhere("user_files.file_name","LIKE","%".$searchData."%");
                $query->Orwhere("user_files.file_original_name","LIKE","%".$searchData."%");
            });
        }
        $userData->orderBy('project_attachments.created_at','desc');

        
        $userData->select('project_attachments.*','user_files.file_type','user_files.file_name','user_files.file_original_name','user_files.file_size','users.name as added_by_name')->groupBy('project_attachments.id');
        
        if(!empty($data['perPage'])){
            $results = $userData->paginate($data['perPage']);
        }else{
            $results = $userData->get();
        }
        
        return $results;
        
    }

    public function projectAttachment(){
        return $this->belongsTo(UserFile::class,'file_id','id');
      } 

}
