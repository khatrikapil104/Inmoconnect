<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use File;
class Group extends Model
{
    use HasFactory,SoftDeletes;

    // public static function getGroupImageAttribute($value = ""){    
    //     if($value != "" && File::exists(Config('constant.GROUP_IMAGE_ROOT_PATH').$value)){
    //         $value = Config('constant.GROUP_IMAGE_URL').$value;
    //     }else{
    //         $value = asset('img/chat_default_group.jpg');
    //     }
    //     return $value;
    // }
    public function getGroupChatHistoryData($request,$login_user_id,$receiver_id,$group_id,$findGroup){
        $UserChat           =   Message::query();
        if (!empty($search)) {
            $UserChat->where('messages.message', 'like', '%' . $search . '%');
        }
        if (!empty($request->record_id)) {
            $chat_histories     =   $UserChat->where('messages.id', $request->record_id)
                ->where('messages.deleted_at', NULL)
                ->leftjoin('groups', 'groups.id', '=', 'messages.group_id')
                ->where('groups.deleted_at', NULL)
                ->leftjoin('chat_uploads', 'messages.id', '=', 'chat_uploads.message_id')
                ->select("messages.*", DB::raw("(select name from users where id=messages.sender_id) as receiver_user_name"), DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id) as filename"), DB::raw("(select file_size from user_files where chat_uploads.document_id = user_files.id) as filesize"), DB::raw("null as message_time"))
                ->get()->toArray();
        } else {
            $chat_histories     =   $UserChat
                ->where('messages.group_id', $group_id)
                ->where('messages.group_id', '!=', 0)
                // ->where('messages.receiver_id','!=',0)
                ->where('messages.deleted_at', NULL)
                // ->havingRaw('sender_id = receiver_id')
                ->leftjoin('groups', 'groups.id', '=', 'messages.group_id')
                ->where('groups.deleted_at', NULL)
                ->distinct('messages.sender_id')
                ->leftjoin('chat_uploads', 'messages.id', '=', 'chat_uploads.message_id')
                ->select("messages.*", DB::raw("(select name from users where id=messages.sender_id) as receiver_user_name"), DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id) as filename"), DB::raw("(select file_size from user_files where chat_uploads.document_id = user_files.id) as filesize"), DB::raw("null as message_time"))
                ->orderBy("id", "ASC")
                ->get()->toArray();
        }

        // dd($chat_histories);
        foreach ($chat_histories as &$user) {
            $last_msg_time = date('H:i', strtotime($user['created_at']));

            $user['receiver_user_name'] =   @ucfirst($user['receiver_user_name']);
            $user['message_time'] =   $last_msg_time;
        }

        DB::table('messages')->where('group_id', $group_id)
            ->where('group_id', '!=', 0)
            ->where('deleted_at', NULL)
            ->where('receiver_id', $login_user_id)
            ->where('sender_id', '!=', $login_user_id)
            ->where('is_read', 0)
            ->update(['is_read' => 1]);

        // echo "<pre>";
        // print_r($chat_histories);die;

        $findGroup->count_online_members = GroupParticipants::where('group_participants.group_id', $findGroup->id)->whereNull('group_participants.deleted_at')->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.is_online', 1)->count();

        $findGroup->group_members = GroupParticipants::where('group_participants.group_id', $findGroup->id)
            ->whereNull('group_participants.deleted_at')
            ->leftJoin('users', 'users.id', 'group_participants.user_id')
            ->select('group_participants.*', 'users.image')
            ->take(5)
            ->get();


        $findGroup->is_group_muted = ChatManagement::where('action_from', $login_user_id)->where('action_to_group_id', $group_id)->whereNull('deleted_at')->where('is_muted', 1)->value('is_muted');

        $findGroup->is_group_left = GroupParticipants::where('group_participants.group_id', $findGroup->id)->where('group_participants.user_id', $login_user_id)->whereNull('deleted_at')->count();

        $findGroup->is_group_left_user = GroupParticipants::withTrashed()->where('group_participants.group_id', $findGroup->id)->where('group_participants.user_id', $login_user_id)->orderBy('id','desc')->first();
        // dd($findGroup->is_group_left_user);
        $findGroup->is_group_admin = GroupParticipants::where('group_participants.group_id', $findGroup->id)->where('group_participants.user_id', $login_user_id)->where('is_admin', 1)->count();

        if (!empty($request->record_id)) {
            $groupChatHistoryData = View('modules.messages.includes.group_chat_history_section', compact("chat_histories", "receiver_id", "findGroup", "group_id", 'request'))->render();
        } else {

            $groupChatHistoryData = View('modules.messages.includes.group_chat_history', compact("chat_histories", "receiver_id", "findGroup", "group_id", 'request'))->render();
        }
        return $groupChatHistoryData;
    }
}
