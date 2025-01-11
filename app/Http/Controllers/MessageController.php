<?php

namespace App\Http\Controllers;

use App\Models\ChatManagement;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB, Redirect, Response, Auth;
use App\Models\Message;
use App\Models\Group;
use App\Models\GroupParticipants;
use App\Models\ChatUpload;
use Illuminate\Validation\Rule;
use File, Str, Hash, Mail, Session;
use App\Events\CrmNotification;
use App\Jobs\ProcessUserFile;
use App\Models\UserFileFolders;
use Maatwebsite\Excel\Facades\Excel;

class MessageController extends Controller
{
    public $model = 'messages';

    public $filterName = 'messageListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'messages.index');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
    }

    public function index(Request $request)
    {
        // dd(123);
        $formData            =    $request->all();
        $login_user_id      =   Auth::user()->id;

        $folderInstance = new UserFileFolders();
        $folders = $folderInstance->loadUserFolder(['perPage' => [], 'userId' => $login_user_id], $request->all(), []);

        $userInstance = new User();

        if (!$request->ajax() || $request->ajax() && !empty($request->requestType) && ($request->requestType == 'private' || $request->requestType == 'contacts')) {
            $chatUsers = $userInstance->loadUserConnectedUsersData(['userRoleName' => 'both', 'userId' => $login_user_id], $request->all());

            if (!$chatUsers->isEmpty()) {

                foreach ($chatUsers as $key => &$value) {

                    $chatUserId = $value->id;

                    $query = Message::query();
                    $query->where(function ($query) use ($login_user_id, $chatUserId) {
                        $query->orWhere(function ($query) use ($login_user_id, $chatUserId) {
                            $query->where("sender_id", $login_user_id);
                            $query->where("receiver_id", $chatUserId);
                        });
                        $query->orWhere(function ($query) use ($login_user_id, $chatUserId) {
                            $query->where("sender_id", $chatUserId);
                            $query->where("receiver_id", $login_user_id);
                        });
                    });
                    $lastChatData =     $query->where('messages.deleted_at', NULL)
                        ->where('messages.group_id', 0)
                        ->select('messages.id', 'messages.sender_id', 'messages.receiver_id', 'messages.message','messages.message_type','custom_title', 'messages.created_at', 'messages.is_upload')->orderBy("messages.id", "DESC")
                        ->first();
                    $value->is_muted = ChatManagement::where('action_from', $login_user_id)->where('action_to', $value->id)->whereNull('deleted_at')->where('is_muted', 1)->value('is_muted');
                    if (!empty($lastChatData)) {
                        $last_msg_time = "";
                        $getTime    =   strtotime(date('Y-m-d', strtotime($lastChatData->created_at)));
                        $todayDate =   strtotime(date('Y-m-d'));
                        if ($todayDate == $getTime) {
                            $last_msg_time  =   date('H:i', strtotime($lastChatData->created_at));
                        } else {
                            $last_msg_time  =  date('d/m/Y', strtotime($lastChatData->created_at));
                        }

                        $unreadCount         =   DB::table('messages')
                            ->where('sender_id', $value->id)
                            ->where('group_id', 0)
                            ->where('receiver_id', $login_user_id)
                            ->where('is_read', 0)
                            ->where('deleted_at', NULL)
                            ->count();

                        $value->unread_msg_count  = $unreadCount;
                        if ($lastChatData->is_upload == 1) {
                            $last_message = "File";
                        } else {
                            $last_message = $lastChatData->message;
                        }
                        $value->message_type      = $lastChatData->message_type;
                        $value->custom_title      = $lastChatData->custom_title;
                        $value->last_message      = $last_message;
                        $value->last_message_time = $last_msg_time;
                        $value->last_message_timestamp = strtotime($lastChatData->created_at);
                    } else {
                        $value->unread_msg_count  = 0;

                        $value->last_message      = "";
                        $value->last_message_time = "";
                        $value->last_message_timestamp = "";
                    }
                }
            }
            $chatUsers    =    array_slice($this->array_msort($chatUsers, ['unread_msg_count' => SORT_DESC, 'last_message_timestamp' => SORT_DESC]), 0);


            $contactUsers = $this->getContactUsers($chatUsers);

            // echo "<pre>";

            $firstUserId = 0;
            foreach ($chatUsers as $key => $user) {
                if (!empty($user['last_message_time']) && !empty($user['last_message'])) {
                    $firstUserId = $user['id'];
                    break;
                }
            }
        }


        if (!$request->ajax() || ($request->ajax() && !empty($request->requestType) && $request->requestType == 'group')) {
            $groupList          =   GroupParticipants::withTrashed()->where('group_participants.user_id', $login_user_id)
                // ->where('group_participants.deleted_at', NULL)
                ->leftjoin('groups', 'groups.id', 'group_participants.group_id')
                ->where('groups.deleted_at', NULL)
                ->select('group_id', "groups.name as group_name", "groups.group_image")
                ->distinct('group_id')
                ->get()->toArray();
            $user_count     =   0;
            $firstGroupId   =   0;
            foreach ($groupList as &$group) {
                // if($firstGroupId == 0 && !empty($group['group_id'])){
                //     $firstGroupId=$group['group_id'];
                // }
                $grouId         =   $group['group_id'];
                $group['is_muted'] = ChatManagement::where('action_from', $login_user_id)->where('action_to_group_id', $grouId)->whereNull('deleted_at')->where('is_muted', 1)->value('is_muted');
                $lastChatData   = DB::table('messages')
                    ->where('messages.group_id', $grouId)
                    ->where('messages.deleted_at', NULL)
                    ->where('messages.group_id', '!=', 0)
                    ->where(function ($query) use ($login_user_id) {
                        $query->orWhere("sender_id", $login_user_id);
                        $query->orWhere("receiver_id", $login_user_id);
                    })
                    ->where('messages.receiver_id', '!=', 0)
                    ->leftjoin('chat_uploads', 'messages.id', '=', 'chat_uploads.message_id')
                    ->select('messages.id', 'messages.sender_id', 'messages.receiver_id', 'messages.message', 'messages.created_at', DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id) as filename"), DB::raw("(select file_size from user_files where chat_uploads.document_id = user_files.id) as filesize"), "messages.is_upload", DB::raw("(select name from users where users.id=messages.sender_id) as sender_name"), 'messages.id as messageId')
                    ->orderBy("messages.id", "desc")
                    ->first();
                if (!empty($lastChatData)) {
                    if (!empty($lastChatData->filename)) {
                        $lastChatData->message      =   "File";
                    }
                    $unreadCount         =   DB::table('messages')
                        ->where('group_id', $grouId)
                        ->where('group_id', '!=', 0)
                        ->where('deleted_at', NULL)
                        ->where('receiver_id', $login_user_id)
                        ->where('sender_id', '!=', $login_user_id)
                        ->where('is_read', 0)
                        ->count();
                    $last_msg_time = "";
                    $getTime    =   strtotime(date('Y-m-d', strtotime($lastChatData->created_at)));
                    $todayDate =   strtotime(date('Y-m-d'));
                    if ($todayDate == $getTime) {
                        $last_msg_time  =   date('H:i', strtotime($lastChatData->created_at));
                    } else {
                        $last_msg_time  =  date('d/m/Y', strtotime($lastChatData->created_at));
                    }


                    // $group['last_message']                   =  $last_message;
                    $group['last_message_time']              =  $last_msg_time;
                    $group['unread_msg_count']               =  $unreadCount;
                    $group['last_message_timestamp']               =  strtotime($lastChatData->created_at);;
                } else {
                    // $group['last_message']                   =  '';
                    $group['last_message_time']                   =  '';
                    $group['unread_msg_count']               =  0;
                    $group['last_message_timestamp']               =  '';
                }
            }

            $groupList    =    array_slice($this->array_msort($groupList, ['unread_msg_count' => SORT_DESC, 'last_message_timestamp' => SORT_DESC]), 0);
        }


        if (!$request->ajax()) {
            $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['userRoleName' => 'agent', 'userId' => $login_user_id], $request->all());
            $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['userRoleName' => 'customer', 'userId' => $login_user_id], $request->all());
            $connectedAgentsArray = [];
            if ($connectedAgentsData->isNotEmpty()) {
                foreach ($connectedAgentsData as $connectAgent) {
                    $connectedAgentsArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')]; //
                }
            }
            $connectedCustomersArray = [];
            if ($connectedCustomersData->isNotEmpty()) {
                foreach ($connectedCustomersData as $connectAgent) {
                    $connectedCustomersArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                }
            }
        }

        // dd($connectedCustomersArray);
        if ($request->ajax()) {
            if (!empty($request->requestType) && ($request->requestType == 'private_contacts')) {
                $chatUsersData =  View('modules.messages.includes.load_private_users', compact("chatUsers"))->render();
                $contactUsersData = View('modules.messages.includes.load_contact_users', compact("contactUsers"))->render();

                $response = array();
                $response["status"] = "success";
                $response["msg"] = "";
                $response['data'] = $chatUsersData;
                $response['contactUsersData'] = $contactUsersData;
                $response["http_code"] = 200;
                return Response::json($response, 200);
            } elseif (!empty($request->requestType) && ($request->requestType == 'private')) {
                $chatUsersData =  View('modules.messages.includes.load_private_users', compact("chatUsers"))->render();

                $response = array();
                $response["status"] = "success";
                $response["msg"] = "";
                $response['data'] = $chatUsersData;
                $response["http_code"] = 200;
                return Response::json($response, 200);
            } elseif (!empty($request->requestType) && ($request->requestType == 'contacts')) {
                $contactUsersData = View('modules.messages.includes.load_contact_users', compact("contactUsers"))->render();

                $response = array();
                $response["status"] = "success";
                $response["msg"] = "";
                $response['data'] = $contactUsersData;
                $response["http_code"] = 200;
                return Response::json($response, 200);
            } elseif (!empty($request->requestType) && $request->requestType == 'group') {
                $groupListData =  View('modules.messages.includes.load_groups', compact("groupList"))->render();
                $response = array();
                $response["status"] = "success";
                $response["msg"] = "";
                $response['data'] = $groupListData;
                $response["http_code"] = 200;
                return Response::json($response, 200);
            }
        } else {
            // dd($chatUsers);
            return View('modules.messages.index', compact("chatUsers", "contactUsers", "firstUserId", "groupList", "connectedAgentsArray", "connectedCustomersArray","folders"));
        }
    }

    public function getContactusers($chatUsers = [])
    {
        $groupedUsers = [];
        if (!empty($chatUsers)) {

            foreach ($chatUsers as $user) {
                $firstLetter = strtoupper(substr($user->name, 0, 1));
                if (!isset($groupedUsers[$firstLetter])) {
                    $groupedUsers[$firstLetter] = [];
                }
                $groupedUsers[$firstLetter][] = $user;
            }

            // Sort the array by keys (alphabetically)
            ksort($groupedUsers);
        }
        return $groupedUsers;
    }


    /**
     * Function is used to list chats between two users
     *
     * @param
     *
     * @return
     */
    public function getUserChatMessage(Request $request)
    {
        $formData           =   $request->all();
        $hideMessageBox = 'no';
        if (!empty($request->login_user_id) && $request->login_user_id > 0) {
            $login_user_id = $request->login_user_id;
            $hideMessageBox = 'yes';
        } else {

            $login_user_id      =   Auth::user()->id;
        }
        $chat_type          =   isset($formData['chat_type']) ? $formData['chat_type'] : '';
        $receiver_id        =   isset($formData['chat_user_id']) ? $formData['chat_user_id'] : 0;
        $group_id           =   isset($formData['group_id']) ? $formData['group_id'] : 0;
        $search             =   isset($formData['search']) ? $formData['search'] : '';
        $receiverName       =   '';
        $groupName          =   '';

        if ($chat_type == 'private') {
            $UserChat           =   Message::where('messages.group_id', 0)->where('messages.deleted_at', NULL);

            if (!empty($search)) {
                $UserChat->where('messages.message', 'like', '%' . $search . '%');
            }
            if (!empty($request->record_id)) {
                $chat_histories     =  $UserChat->where('messages.id', $request->record_id)->leftjoin('chat_uploads', 'messages.id', '=', 'chat_uploads.message_id')->select("messages.*", DB::raw("(select name from users where id=messages.receiver_id) as receiver_user_name"), DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id) as filename"), DB::raw("(select file_size from user_files where chat_uploads.document_id = user_files.id) as filesize"), DB::raw("null as message_time"))->get()->toArray();
            } else {
                $chat_histories     = $UserChat->where(function ($query) use ($login_user_id, $receiver_id) {
                    $query->orWhere(function ($query) use ($login_user_id, $receiver_id) {
                        $query->where("sender_id", $login_user_id);
                        $query->where("receiver_id", $receiver_id);
                    });
                    $query->orWhere(function ($query) use ($login_user_id, $receiver_id) {
                        $query->where("sender_id", $receiver_id);
                        $query->where("receiver_id", $login_user_id);
                    });
                })
                    ->leftjoin('chat_uploads', 'messages.id', '=', 'chat_uploads.message_id')
                    ->select("messages.*", DB::raw("(select name from users where id=messages.receiver_id) as receiver_user_name"), DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id) as filename"), DB::raw("(select file_size from user_files where chat_uploads.document_id = user_files.id) as filesize"), DB::raw("null as message_time"))
                    ->orderBy("id", "ASC")
                    ->get()->toArray();
            }

            if (!empty($chat_histories)) {

                foreach ($chat_histories as &$user) {
                    $last_msg_time = date('H:i', strtotime($user['created_at']));

                    $user['message_time'] =   $last_msg_time;

                    if ($user['sender_id'] != $login_user_id) {

                        DB::table('messages')->where('messages.id', $user['id'])->where('is_read', 0)->update(array('is_read' => 1));
                    }
                }
            }
            // print_r($chat_histories);die;
            $receiverData = User::where("id", $receiver_id)->first();
            if (!empty($receiverData)) {
                $receiverData->is_muted = ChatManagement::where('action_from', $login_user_id)->where('action_to', $receiverData->id)->whereNull('deleted_at')->where('is_muted', 1)->value('is_muted');
            }
            if (!empty($request->record_id)) {
                $chatHistoryData =  View('modules.messages.includes.private_chat_history_section', compact("chat_histories", "receiver_id", "receiverData", "hideMessageBox", "request"))->render();
            } else {
                $chatHistoryData =  View('modules.messages.includes.private_chat_history', compact("chat_histories", "receiver_id", "receiverData", "hideMessageBox", "request"))->render();
            }
            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['data'] = $chatHistoryData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } elseif ($chat_type == 'group_chat') {
            $findGroup  =   DB::table('groups')->where('id', $group_id)
                ->where('deleted_at', NULL)
                ->first();

            if(empty($findGroup)){
                $response = array();
                $response["status"] = "error";
                $response["msg"] = trans("messages.Invalid_request");
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }
            $groupInstance = new Group();

            $groupChatHistoryData = $groupInstance->getGroupChatHistoryData($request,$login_user_id,$receiver_id,$group_id,$findGroup);

            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['data'] = $groupChatHistoryData;
            $response["http_code"] = 200;
            return Response::json($response, 200);

        }
    }

    public function loadGroupDetails(Request $request, $groupId)
    {
        $login_user_id = auth()->user()->id;
        $findGroup  =   DB::table('groups')->leftJoin('users', 'users.id', 'groups.created_by')->where('groups.id', $groupId)
            ->where('groups.deleted_at', NULL)->select('groups.*', 'users.name as created_by_name')
            ->first();
        if (!empty($findGroup)) {
            if (!empty($request->type) && ($request->type == 'all' || $request->type == 'group_members')) {
                $findGroup->group_members = GroupParticipants::where('group_participants.group_id', $findGroup->id)
                    ->whereNull('group_participants.deleted_at')
                    ->leftJoin('users', 'users.id', 'group_participants.user_id')
                    ->select('group_participants.*', 'users.image', 'users.is_online', 'users.name', 'users.user_role_id')
                    ->paginate(10);
                $htmlData = View("modules.messages.includes.load_group_members", ['findGroup' => $findGroup])->render();
            }


            $findGroup->group_admins = GroupParticipants::where('group_id', $groupId)->whereNull('group_participants.deleted_at')->where('group_participants.is_admin', 1)->leftJoin('users', 'users.id', 'group_participants.user_id')->pluck('users.name')->toArray();

            if (!empty($request->type) && ($request->type == 'all' || $request->type == 'group_files')) {
                $findGroup->group_files = ChatUpload::leftjoin('messages', 'messages.id', 'chat_uploads.message_id')->where('messages.group_id', $groupId)->distinct('chat_uploads.document_id')->groupBy('chat_uploads.document_id')->whereNull('chat_uploads.deleted_at')->select('chat_uploads.*', DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id) as file_name"), DB::raw("(select file_size from user_files where chat_uploads.document_id = user_files.id) as file_size"), DB::raw("(select name from users where messages.sender_id = users.id) as sender_name"))->orderBy('chat_uploads.created_at', 'desc')->paginate(10);
                $htmlData = View("modules.messages.includes.load_group_files", ['findGroup' => $findGroup])->render();
            }

            if (!empty($request->type) && $request->type == 'all') {
                $findGroup->is_group_left = GroupParticipants::withTrashed()->where('group_participants.group_id', $findGroup->id)->where('group_participants.user_id', $login_user_id)->whereNotNull('deleted_at')->count();

                $findGroup->is_group_admin = GroupParticipants::where('group_participants.group_id', $findGroup->id)->where('group_participants.user_id', $login_user_id)->where('is_admin', 1)->count();
                $htmlData = View("modules.messages.includes.group_details", ['findGroup' => $findGroup])->render();
            }
            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['data'] = $htmlData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function ListGroups(Request $request)
    {
        $formData           =   $request->all();
        $login_user_id      =   Auth::user()->id;
        $response           =   array();
        $redirectId         =   (isset($formData['gid']) && !empty($formData['gid'])) ? $formData['gid'] : 0;
        $groupList          =   GroupParticipants::where('group_participants.user_id', $login_user_id)
            ->where('group_participants.deleted_at', NULL)
            ->leftjoin('groups', 'groups.id', 'group_participants.group_id')
            ->where('groups.deleted_at', NULL)
            ->select('group_id', "groups.name as group_name")
            ->distinct('group_id')
            ->get()->toArray();
        $user_count     =   0;
        $firstGroupId   =   0;

        foreach ($groupList as &$group) {
            // if($firstGroupId == 0 && !empty($group['group_id'])){
            //     $firstGroupId=$group['group_id'];
            // }
            $grouId         =   $group['group_id'];
            $findGroup      =   Group::where('id', $grouId)
                ->where('deleted_at', NULL)
                ->value('created_by');
            $lastChatData   = DB::table('messages')
                ->where('messages.group_id', $grouId)
                ->where('messages.deleted_at', NULL)
                ->where('messages.group_id', '!=', 0)
                ->where(function ($query) use ($login_user_id) {
                    $query->orWhere("sender_id", $login_user_id);
                    $query->orWhere("receiver_id", $login_user_id);
                })
                ->where('messages.receiver_id', '!=', 0)
                ->leftjoin('chat_uploads', 'messages.id', '=', 'chat_uploads.message_id')
                ->select('messages.id', 'messages.sender_id', 'messages.receiver_id', 'messages.message', 'messages.created_at', DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id) as filename"), DB::raw("(select file_size from user_files where chat_uploads.document_id = user_files.id) as filesize"), "messages.is_upload", DB::raw("(select name from users where users.id=messages.sender_id) as sender_name"), 'messages.id as messageId')
                ->orderBy("messages.id", "desc")
                ->first();
            if (!empty($lastChatData)) {
                if (!empty($lastChatData->filename)) {
                    $lastChatData->message      =   "File";
                }
                $unreadCount         =   DB::table('messages')
                    ->where('group_id', $grouId)
                    ->where('group_id', '!=', 0)
                    ->where('deleted_at', NULL)
                    ->where('receiver_id', $login_user_id)
                    ->where('sender_id', '!=', $login_user_id)
                    ->where('is_read', 0)
                    ->count();
                $last_msg_time = "";
                $getTime    =   strtotime(date('Y-m-d', strtotime($lastChatData->created_at)));
                $todayDate =   strtotime(date('Y-m-d'));
                if ($todayDate == $getTime) {
                    $last_msg_time  =   date('H:i', strtotime($lastChatData->created_at));
                } else {
                    $last_msg_time  =  date('d/m/Y', strtotime($lastChatData->created_at));
                }

                if ($lastChatData->is_upload == 1) {
                    $lastMessageData = json_decode($lastChatData->message, true);
                    if (!empty($lastMessageData)) {
                        foreach ($lastMessageData as $value1) {

                            if (!empty($value1['extension']) && !empty($value1['url'])) {
                                if ($value1['extension'] == 'jpg' || $value1['extension'] == 'jpeg' || $value1['extension'] == 'gif' || $value1['extension'] == 'png') {
                                    $last_message = 'Image';
                                } else if ($value1['extension'] == 'pdf') {
                                    $last_message = 'File';
                                }
                            }
                        }
                    }
                } else {
                    $last_message = $lastChatData->message;
                }

                $group['last_message']                   =  $last_message;
                $group['last_message_time']              =  $last_msg_time;
                $group['unread_msg_count']               =  $unreadCount;
            } else {
                $group['last_message']                   =  '';
                $group['last_message_time']                   =  '';
                $group['unread_msg_count']               =  0;
            }
        }

        $chatUsers          =   User::where('users.id', '!=', Auth::user()->id)
            ->where(function ($query) {
                $query->where('user_role_id', STAFF_ROLE_ID)
                    ->orWhere('user_role_id', SUPER_ADMIN_ROLE_ID);
            })
            ->select('users.name', 'users.id')
            ->where('users.is_active', 1)
            ->where('users.deleted_at', NULL)
            ->where('users.name', '!=', '')
            ->get();
        $firstUserId = 0;
        if (!$chatUsers->isEmpty()) {

            foreach ($chatUsers as $key => $value) {
                if ($value->id) {
                    $firstUserId = $value->id;
                    break;
                }
            }
        }

        $groupList    =    array_slice($this->array_msort($groupList, ['unread_msg_count' => SORT_DESC, 'last_message_time' => SORT_DESC]), 0);
        foreach ($groupList as &$group) {
            if ($firstGroupId == 0 && !empty($group['group_id'])) {
                $firstGroupId = $group['group_id'];
            }
        }
        if (!empty($redirectId) && $redirectId > 0) {
            $firstGroupId = $redirectId;
        }

        $badWordsArray = DB::table('bad_words')->get()->toArray();
        if ($request->ajax()) {
            return View::make('admin.message.get_group_users', compact("groupList", "firstGroupId", "chatUsers", "badWordsArray"));
        } else {

            return View::make('admin.message.group_list', compact("groupList", "firstGroupId", "chatUsers", "badWordsArray"));
        }
    }


    public function leaveGroup(Request $request, $group_id)
    {
        $formData           =   $request->all();
        $login_user_id      =   Auth::user()->id;
        $login_user_name      =   Auth::user()->name;
        $response           =   array();
        if ($login_user_id != '') {

            $findGroup  =   Group::where('id', $group_id)
                ->where('deleted_at', NULL)
                ->first();
            if (empty($findGroup)) {
                $response['status']     =  "error";
                $response['msg']    =  "This group is not available.";
                $response['data']       =   array();
                return json_encode($response);
            }

            $findGroupUser           =   GroupParticipants::where('group_participants.group_id', $group_id)->where('group_participants.user_id', $login_user_id)
                ->where('group_participants.deleted_at', NULL)
                ->first();

            if (!empty($findGroupUser)) {

                GroupParticipants::where('group_participants.group_id', $group_id)->where('group_participants.user_id', $login_user_id)->delete();

                $groupParticipants         =   GroupParticipants::withTrashed()->where('group_id', $group_id)->get();
                if (isset($groupParticipants) && $groupParticipants->isNotEmpty()) {
                    foreach ($groupParticipants as $participant) {
                        // Save Message Data
                        $this->saveMessageData(['group_id' => $group_id, 'sender_id' => $login_user_id, 'receiver_id' => $participant->user_id,  'message' => 'CRM_GROUP_MESSAGE_7', 'values' => ['value1' => $login_user_name, 'value2' => $findGroup->name], 'message_type' => 'comment']);
                    }
                }

                // // delete group if there is only one user left...
                // $user_left_ids     =   GroupParticipants::where('group_id',$group_id)
                // ->where('deleted_at', NULL)
                // ->pluck('user_id')->toArray();

                // if(count($user_left_ids) < 1){
                //     // then delete group...
                //     Group::where('id',$group_id)
                //                 // ->where('workspace_id',$workspace_id)
                //                 ->update(['deleted_at'=>now(),'is_active'=>0]);
                //     GroupParticipants::where('group_id',$group_id)
                //     // ->where('workspace_id',$workspace_id)
                //     ->update(['deleted_at'=>now()]);
                //     Message::where('group_id',$group_id)
                //                 ->update(['deleted_at'=>now()]);

                // $response['status']         =  "last_success";
                // $response['msg']        =  " You have successfully left the group and the Group has been removed successfully.";
                // return json_encode($response);

                // }

            }


            Session::flash('flash_notice', trans("You have successfully left the group."));
            // $response['status']         =  "success";
            // $response['msg']        =  " You have successfully left the group.";



            return redirect()->route(routeNamePrefix() . 'messages.index');
        } else {
            $response['status']     =  "error";
            $response['msg']    =  "Invalid request.";
            $response['data']       =   array();
        }
        return json_encode($response);
    }

    public function createGroup(Request $request)
    {
        $login_user_id      =   Auth::user()->id;
        $login_user_name      =   Auth::user()->name;
        $formData = $request->all();
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'name' => 'required',

                ),
                array(

                    "name.required" => trans("The group name field is required"),

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {

                DB::beginTransaction();
                $obj   = new Group;
                $obj->created_by = $login_user_id;
                $obj->name = $request->name;
                $obj->group_number = getGroupNumber();
                $obj->save();
                $lastId = $obj->id;
                if (empty($lastId)) {
                    DB::rollback();
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Something_went_wrong");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }

                //Adding a entry in group participants
                $obj2   =  new GroupParticipants;
                $obj2->user_id = $login_user_id;
                $obj2->group_id = $lastId;
                $obj2->is_admin = 1;
                $obj2->save();

                // Save Message Data
                $this->saveMessageData(['group_id' => $lastId, 'sender_id' => $login_user_id, 'receiver_id' => $login_user_id,  'message' => 'CRM_GROUP_MESSAGE_1', 'values' => ['value1' => $login_user_name, 'value2' => $request->name], 'message_type' => 'comment']);


                if (!empty($request->group_customers)) {
                    foreach ($request->group_customers as $customer) {
                        $obj3   =  new GroupParticipants;
                        $obj3->user_id = $customer;
                        $obj3->group_id = $lastId;
                        $obj3->is_admin = 0;
                        $obj3->save();
                        $customerName = User::where('id', $customer)->value('name');
                        // Save Message Data
                        $this->saveMessageData(['group_id' => $lastId, 'sender_id' => $login_user_id, 'receiver_id' => $customer, 'message' => 'CRM_GROUP_MESSAGE_3', 'values' => ['value1' => $login_user_name, 'value2' => $customerName], 'message_type' => 'comment']);
                    }
                }

                if (!empty($request->group_agents)) {
                    foreach ($request->group_agents as $agent) {
                        $obj4   =  new GroupParticipants;
                        $obj4->user_id = $agent;
                        $obj4->group_id = $lastId;
                        $obj4->is_admin = (!empty($request->group_admins) && in_array($agent, $request->group_admins)) ? 1 : 0;
                        $obj4->save();
                        $agentName = User::where('id', $agent)->value('name');
                        // Save Message Data
                        $this->saveMessageData(['group_id' => $lastId, 'sender_id' => $login_user_id, 'receiver_id' => $agent, 'message' => 'CRM_GROUP_MESSAGE_2', 'values' => ['value1' => $login_user_name, 'value2' => $agentName], 'message_type' => 'comment']);
                    }
                }

                DB::commit();

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans("Group created successfully");
                $response["data"] = route(routeNamePrefix() . 'messages.index');
                $response["http_code"] = 200;
                return Response::json($response, 200);
            }
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function loadEditGroupView(Request $request, $id)
    {
        $login_user_id = Auth::user()->id;
        $groupData = Group::where('id', $id)->first();
        $customerRoleId = getUserRoleId('customer');
        $agentRoleId = getUserRoleId('agent');
        if (!empty($groupData)) {
            $selectedGroupCustomers = GroupParticipants::where('group_participants.group_id', $groupData->id)->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.user_role_id', $customerRoleId)->pluck('group_participants.user_id')->toArray();
            $selectedGroupAgents = GroupParticipants::where('group_participants.group_id', $groupData->id)->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.user_role_id', $agentRoleId)->pluck('group_participants.user_id')->toArray();

            $selectedGroupAdmins = GroupParticipants::where('group_participants.group_id', $groupData->id)->where('group_participants.is_admin', 1)->pluck('group_participants.user_id')->toArray();
            $userInstance = new User();
            $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['userRoleName' => 'agent', 'userId' => $login_user_id], $request->all());
            $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['userRoleName' => 'customer', 'userId' => $login_user_id], $request->all());
            $connectedAgentsArray = [];
            if ($connectedAgentsData->isNotEmpty()) {
                foreach ($connectedAgentsData as $connectAgent) {
                    $connectedAgentsArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                }
            }
            $connectedCustomersArray = [];
            if ($connectedCustomersData->isNotEmpty()) {
                foreach ($connectedCustomersData as $connectAgent) {
                    $connectedCustomersArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                }
            }

            $type = 'edit';
            $htmlData = View('modules.messages.includes.create_edit_group', compact('groupData', 'type', 'selectedGroupCustomers', 'selectedGroupAgents', 'selectedGroupAdmins', 'connectedAgentsArray', 'connectedCustomersArray'))->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $htmlData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function updateGroup(Request $request, $groupId)
    {
        $login_user_id      =   Auth::user()->id;
        $login_user_name      =   Auth::user()->name;
        $formData = $request->all();
        // dd($formData);
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'name' => 'required',

                ),
                array(

                    "name.required" => trans("The group name field is required"),

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                DB::beginTransaction();
                $obj   = Group::find($groupId);
                if ($request->name != $obj->name) {
                    // Save Message Data
                    $this->saveMessageData(['group_id' => $groupId, 'message' => 'CRM_GROUP_MESSAGE_4', 'values' => ['value1' => $login_user_name, 'value2' => $request->name], 'message_type' => 'comment']);
                }


                $obj->name = $request->name;
                $obj->save();
                $lastId = $obj->id;
                if (empty($lastId)) {
                    DB::rollback();
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Something_went_wrong");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }

                $customerRoleId = getUserRoleId('customer');
                if (!empty($request->group_customers)) {
                    foreach ($request->group_customers as $customer) {
                        $checkIfThisCustomerAlreadyExists = GroupParticipants::where('group_participants.group_id', $lastId)->whereNull('group_participants.deleted_at')->where('group_participants.user_id', $customer)->first();
                        if (!empty($checkIfThisCustomerAlreadyExists)) {
                            $obj3   =  GroupParticipants::find($checkIfThisCustomerAlreadyExists->id);
                        } else {
                            $obj3   =  new GroupParticipants;
                            $customerName = User::where('id', $customer)->value('name');
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'sender_id' => $login_user_id, 'receiver_id' => $customer, 'message' => 'CRM_GROUP_MESSAGE_3', 'values' => ['value1' => $login_user_name, 'value2' => $customerName], 'message_type' => 'comment']);
                        }
                        $obj3->user_id = $customer;
                        $obj3->group_id = $lastId;
                        $obj3->is_admin = 0;
                        $obj3->save();
                    }
                    $groupCustomersNotInCurrent = GroupParticipants::where('group_participants.group_id', $lastId)->whereNull('group_participants.deleted_at')->whereNotIn('group_participants.user_id', $request->group_customers)->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.user_role_id', $customerRoleId)->pluck('group_participants.id');
                    if (!empty($groupCustomersNotInCurrent)) {
                        foreach ($groupCustomersNotInCurrent as $notAvgGrpPart) {
                            $user_id = GroupParticipants::find($notAvgGrpPart)->user_id;
                            $customerName = User::where('id', $user_id)->value('name');
                            GroupParticipants::where('id', $notAvgGrpPart)->delete();
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'message' => 'CRM_GROUP_MESSAGE_5', 'values' => ['value1' => $login_user_name, 'value2' => $customerName], 'message_type' => 'comment']);
                        }
                    }
                } else {
                    $groupCustomersNotInCurrent = GroupParticipants::where('group_participants.group_id', $lastId)->whereNull('group_participants.deleted_at')->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.user_role_id', $customerRoleId)->pluck('group_participants.id');
                    if (!empty($groupCustomersNotInCurrent)) {
                        foreach ($groupCustomersNotInCurrent as $notAvgGrpPart) {
                            $user_id = GroupParticipants::find($notAvgGrpPart)->user_id;
                            $customerName = User::where('id', $user_id)->value('name');
                            GroupParticipants::where('id', $notAvgGrpPart)->delete();
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'message' => 'CRM_GROUP_MESSAGE_5', 'values' => ['value1' => $login_user_name, 'value2' => $customerName], 'message_type' => 'comment']);
                        }
                    }
                }

                $agentRoleId = getUserRoleId('agent');
                if (!empty($request->group_agents)) {
                    // dd($request->group_agents);
                    foreach ($request->group_agents as $agent) {
                        $checkIfThisAgentAlreadyExists = GroupParticipants::where('group_id', $lastId)->whereNull('deleted_at')->where('user_id', $agent)->where('is_admin', 0)->first();
                        // dd($agent);
                        if (!empty($checkIfThisAgentAlreadyExists)) {
                            $obj4   =  GroupParticipants::find($checkIfThisAgentAlreadyExists->id);
                        } else {
                            $obj4   =  new GroupParticipants;
                            $agentName = User::where('id', $agent)->value('name');
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'message' => 'CRM_GROUP_MESSAGE_2', 'values' => ['value1' => $login_user_name, 'value2' => $agentName], 'message_type' => 'comment']);
                        }
                        $obj4->user_id = $agent;
                        $obj4->group_id = $lastId;
                        $obj4->is_admin = (!empty($request->group_admins) && in_array($agent, $request->group_admins)) ? 1 : 0;
                        // $obj4->is_admin = 0;
                        $obj4->save();
                    }
                    // dd('ok');
                    $groupAgentsNotInCurrent = GroupParticipants::where('group_participants.group_id', $lastId)->whereNull('group_participants.deleted_at')
                        ->whereNotIn('group_participants.user_id', $request->group_agents)
                        ->where('group_participants.user_id', '!=', $login_user_id)
                        ->where('group_participants.is_admin', 0)
                        ->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.user_role_id', $agentRoleId)
                        ->select('group_participants.id as group_participants_id')->pluck('group_participants_id');
                    // dd($groupAgentsNotInCurrent);
                    if (!empty($groupAgentsNotInCurrent)) {
                        foreach ($groupAgentsNotInCurrent as $notAvgGrpPart) {
                            $user_id = GroupParticipants::find($notAvgGrpPart)->user_id;
                            $agentName = User::where('id', $user_id)->value('name');
                            GroupParticipants::where('id', $notAvgGrpPart)->delete();
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'message' => 'CRM_GROUP_MESSAGE_6', 'values' => ['value1' => $login_user_name, 'value2' => $agentName], 'message_type' => 'comment']);
                        }
                    }
                } else {
                    $groupAgentsNotInCurrent = GroupParticipants::where('group_participants.group_id', $lastId)->whereNull('group_participants.deleted_at')
                        ->where('group_participants.user_id', '!=', $login_user_id)
                        ->where('group_participants.is_admin', 0)
                        ->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.user_role_id', $agentRoleId)
                        ->select('group_participants.id as group_participants_id')->pluck('group_participants_id');
                    // dd($groupAgentsNotInCurrent);
                    if (!empty($groupAgentsNotInCurrent)) {
                        foreach ($groupAgentsNotInCurrent as $notAvgGrpPart) {
                            $user_id = GroupParticipants::find($notAvgGrpPart)->user_id;
                            $agentName = User::where('id', $user_id)->value('name');
                            GroupParticipants::where('id', $notAvgGrpPart)->delete();
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'message' => 'CRM_GROUP_MESSAGE_6', 'values' => ['value1' => $login_user_name, 'value2' => $agentName], 'message_type' => 'comment']);
                        }
                    }
                }

                if (!empty($request->group_admins)) {
                    foreach ($request->group_admins as $admin) {
                        $checkIfThisAdminAlreadyExists = GroupParticipants::where('group_id', $lastId)
                            ->whereNull('deleted_at')
                            ->where('user_id', $admin)
                            ->where('is_admin', 1)
                            ->first();
                        // dd($admin);
                        if (!empty($checkIfThisAdminAlreadyExists)) {
                            $obj4   =  GroupParticipants::find($checkIfThisAdminAlreadyExists->id);
                        } else {
                            $obj4   =  new GroupParticipants;
                            $agentName = User::where('id', $admin)->value('name');
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'message' => 'CRM_GROUP_MESSAGE_2', 'values' => ['value1' => $login_user_name, 'value2' => $agentName], 'message_type' => 'comment']);
                        }
                        $obj4->user_id = $admin;
                        $obj4->group_id = $lastId;
                        $obj4->is_admin = 1;
                        $obj4->save();
                    }
                    $groupAdminNotInCurrent = GroupParticipants::where('group_participants.group_id', $lastId)->whereNull('group_participants.deleted_at')
                        ->whereNotIn('group_participants.user_id', $request->group_admins)
                        ->where('group_participants.user_id', '!=', $login_user_id)
                        ->where('group_participants.is_admin', 1)
                        ->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.user_role_id', $agentRoleId)
                        ->select('group_participants.id as group_participants_id')->pluck('group_participants_id');
                    // dd($groupAgentsNotInCurrent);
                    if (!empty($groupAdminNotInCurrent)) {
                        foreach ($groupAdminNotInCurrent as $notAvgGrpPart) {
                            $user_id = GroupParticipants::find($notAvgGrpPart)->user_id;
                            $adminName = User::where('id', $user_id)->value('name');
                            GroupParticipants::where('id', $notAvgGrpPart)->delete();
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'message' => 'CRM_GROUP_MESSAGE_6', 'values' => ['value1' => $login_user_name, 'value2' => $adminName], 'message_type' => 'comment']);
                        }
                    }
                } else {
                    $groupAgentsNotInCurrent = GroupParticipants::where('group_participants.group_id', $lastId)->whereNull('group_participants.deleted_at')
                        ->where('group_participants.user_id', '!=', $login_user_id)
                        ->where('group_participants.is_admin', 1)
                        ->leftJoin('users', 'users.id', 'group_participants.user_id')->where('users.user_role_id', $agentRoleId)
                        ->select('group_participants.id as group_participants_id')->pluck('group_participants_id');
                    // dd($groupAgentsNotInCurrent);
                    if (!empty($groupAgentsNotInCurrent)) {
                        foreach ($groupAgentsNotInCurrent as $notAvgGrpPart) {
                            $user_id = GroupParticipants::find($notAvgGrpPart)->user_id;
                            $agentName = User::where('id', $user_id)->value('name');
                            GroupParticipants::where('id', $notAvgGrpPart)->delete();
                            // Save Message Data
                            $this->saveMessageData(['group_id' => $lastId, 'message' => 'CRM_GROUP_MESSAGE_6', 'values' => ['value1' => $login_user_name, 'value2' => $agentName], 'message_type' => 'comment']);
                        }
                    }
                }

                DB::commit();

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans('messages.grp_updated_successfully');
                $response["data"] = route(routeNamePrefix() . 'messages.index');
                $response["http_code"] = 200;
                return Response::json($response, 200);
            }
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function MarkAsReadMessage(Request $request)
    {
        $formData           =   $request->all();
        $login_user_id      =   Auth::user()->id;
        $group_id           =   $formData['group_id'];
        $response           =   array();
        if ($login_user_id != '') {
            $userExist      =    User::where('id', $login_user_id)
                ->where([
                    ['is_active',    '=',   1],
                    ['deleted_at',   '=',    NULL],
                ])
                ->first();
            if ($userExist) {
                // check group availablity
                $findUserGroup  =   GroupParticipants::where('group_id', $group_id)
                    ->where('deleted_at', NULL)
                    ->where('user_id', $login_user_id)
                    ->first();
                // print_r($findUserGroup);die;
                if (!empty($findUserGroup)) {
                    $findGroup  =   Group::where('id', $group_id)
                        ->first();
                    if (!empty($findGroup)) {
                        $unreadCount         =   DB::table('messages')
                            // ->where('workspace_id',$workspace_id)
                            ->where('group_id', $group_id)
                            ->where('group_id', '!=', 0)
                            ->where('deleted_at', NULL)
                            ->where('receiver_id', $login_user_id)
                            ->where('sender_id', '!=', $login_user_id)
                            ->where('is_read', 0)
                            ->update(['is_read' => 1]);
                        //Save Audit Logs
                        $this->saveAuditLog(Auth::user()->id, $group_id, 'messages', 'MarkAsRead', '');

                        Session::flash('flash_notice', trans("All messages marked as read."));
                        $response['status']     =  "success";
                        $response['msg']    =  "All messages marked as read.";
                        $response['data']       =  (object)array();
                        return json_encode($response);
                    } else {
                        $response['status']     =  "error";
                        $response['msg']    =  "This group is not available.";
                        $response['data']       =  (object)array();
                        return json_encode($response);
                    }
                } else {
                    $response['status']     =  "error";
                    $response['msg']    =  "Access denied.";
                    $response['data']       =  (object)array();
                }
            } else {
                $response['status']     =  "error";
                $response['msg']    =  "The user does not exist.";
                $response['data']       =  (object)array();
            }
        } else {
            $response['status']     =  "error";
            $response['msg']    =  "Invalid request.";
            $response['data']       =  (object)array();
        }
        return json_encode($response);
    }

    public function deleteGroup(Request $request, $group_id)
    {
        $formData           =   $request->all();
        $login_user_id      =   Auth::user()->id;
        $login_user_name      =   Auth::user()->name;

        $response           =   array();
        if ($login_user_id != '') {

            $findGroup  =   Group::where('id', $group_id)
                ->where('deleted_at', NULL)
                ->first();
            if (empty($findGroup)) {
                $response['status']     =  "error";
                $response['msg']    =  "This group is not available.";
                return json_encode($response);
            }

            if ($login_user_id == $findGroup->created_by) {

                Group::where('id', $group_id)->delete();
                GroupParticipants::where('group_id', $group_id)->delete();

                $groupParticipants         =   GroupParticipants::withTrashed()->where('group_id', $group_id)->get();
                if ($groupParticipants && $groupParticipants->isNotEmpty()) {
                    foreach ($groupParticipants as $participant) {
                        // Save Message Data
                        $this->saveMessageData(['group_id' => $group_id, 'sender_id' => $login_user_id, 'receiver_id' => $participant->user_id,  'message' => 'CRM_GROUP_MESSAGE_8', 'values' => ['value1' => $login_user_name, 'value2' => $findGroup->name], 'message_type' => 'comment']);
                    }
                }

                // $response['status']         =  "success";
                // $response['msg']        =  "Group has been deleted successfully.";
                Session::flash('flash_notice', trans('messages.grp_deleted_successfuly'));

                return redirect()->route(routeNamePrefix() . 'messages.index');
            } else {
                // $response['status']     =  "error";
                // $response['msg']    =  "You are not allowed to delete this group.";
                Session::flash('flash_notice', trans('messages.not_allow_to_delete_this_grp'));
                return redirect()->route(routeNamePrefix() . 'messages.index');
            }
        } else {
            // $response['status']     =  "error";
            // $response['msg']    =  "Invalid request.";
            Session::flash('error', trans("Invalid request."));
            return redirect()->route(routeNamePrefix() . 'messages.index');
        }
    }

    public function uploadGroupImage(Request $request, $groupId)
    {
        // $user = User::where('id',Auth::user()->id)->first();
        $formData = $request->all();
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'group_image'      => 'nullable|mimes:jpg,jpeg,png',


                ),
                array(

                    "group_image.mimes" => trans("messages.The_image_field_must_be_a_file_of_type_jpg_jpeg_png"),


                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {

                DB::beginTransaction();
                $obj   = Group::find($groupId);

                if ($request->hasFile('group_image')) {
                    $extension = $request->file('group_image')->getClientOriginalExtension();
                    $originalName = $request->file('group_image')->getClientOriginalName();
                    $fileName = time() . '-group-image.' . ($groupId) . '.' . $extension;
                    $folderPath = Config('constant.GROUP_IMAGE_ROOT_PATH');
                    if (!File::exists($folderPath)) {
                        File::makeDirectory($folderPath, $mode = 0777, true);
                    }
                    if ($request->file('group_image')->move($folderPath, $fileName)) {
                        $obj->group_image = $fileName;
                    }
                }
                $obj->save();
                $lastId = $obj->id;
                if (empty($lastId)) {
                    DB::rollback();
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Something_went_wrong");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }
                DB::commit();

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans('messages.grp_img_updated_successfully');
                $response["data"] = route(routeNamePrefix() . 'user.index');
                $response["http_code"] = 200;
                return Response::json($response, 200);
            }
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function loadSinglePrivateMessage(Request $request, $messageId)
    {
        $messageData = Message::where('messsages.id', $messageId)->select('messages.*', DB::raw("(SELECT name from users WHERE messages.sender_id = users.id) as sender_name"))->first();
        return View('modules.messages.includes.load_single_private_message', compact("messageData"));
    }

    public function loadSingleGroupMessage(Request $request, $messageId)
    {
        $messageData = Message::where('messsages.id', $messageId)->select('messages.*', DB::raw("(SELECT name from users WHERE messages.sender_id = users.id) as sender_name"))->first();
        return View('modules.messages.includes.load_single_group_message', compact("messageData"));
    }

    public function loadSinglePrivateMessageInSidebar(Request $request, $messageId)
    {
    }

    public function loadSingleGroupMessageInSidebar(Request $request, $messageId)
    {
    }

    public function mutePrivateChat(Request $request, $chatUserId)
    {
        $loggedInUserId = Auth::user()->id;
        $checkIfAlreadyExists = ChatManagement::where('action_from', $loggedInUserId)->where('action_to', $chatUserId)->whereNull('deleted_at')->first();
        if (!empty($checkIfAlreadyExists)) {
            $obj  = ChatManagement::find($checkIfAlreadyExists->id);
        } else {

            $obj   =   new ChatManagement();
        }
        $obj->action_from   = $loggedInUserId;
        $obj->action_to     = $chatUserId;
        $obj->is_muted     = !empty($request->action_val) ? 1 : 0;
        $obj->save();
        if (!empty($request->action_val)) {

            Session::flash('flash_notice', trans('messages.mute_the_chat'));
        } else {
            Session::flash('flash_notice', trans('messages.umnute_the_chat'));
        }
        return redirect()->route(routeNamePrefix() . 'messages.index');
    }

    public function muteGroupChat(Request $request, $chatUserId)
    {
        $loggedInUserId = Auth::user()->id;
        $checkIfAlreadyExists = ChatManagement::where('action_from', $loggedInUserId)->where('action_to_group_id', $chatUserId)->whereNull('deleted_at')->first();
        if (!empty($checkIfAlreadyExists)) {
            $obj  = ChatManagement::find($checkIfAlreadyExists->id);
        } else {

            $obj   =   new ChatManagement();
        }
        $obj->action_from   = $loggedInUserId;
        $obj->action_to_group_id     = $chatUserId;
        $obj->is_muted     = !empty($request->action_val) ? 1 : 0;
        $obj->save();
        if (!empty($request->action_val)) {

            Session::flash('flash_notice', trans('messages.mute_group_chat'));
        } else {
            Session::flash('flash_notice', trans('messages.umnuted_thegroup_chat'));
        }
        return redirect()->route(routeNamePrefix() . 'messages.index');
    }


    public function deletePrivateChat(Request $request, $chatUserId)
    {
        $loggedInUserId = Auth::user()->id;
        Message::where('messages.group_id', 0)
            ->where('messages.deleted_at', NULL)
            ->where(function ($query) use ($loggedInUserId, $chatUserId) {
                $query->orWhere(function ($query) use ($loggedInUserId, $chatUserId) {
                    $query->where("sender_id", $loggedInUserId);
                    $query->where("receiver_id", $chatUserId);
                });
                $query->orWhere(function ($query) use ($loggedInUserId, $chatUserId) {
                    $query->where("sender_id", $chatUserId);
                    $query->where("receiver_id", $loggedInUserId);
                });
            })->delete();
        Session::flash('flash_notice', trans('messages.Chat_deleted_successfully'));

        return redirect()->route(routeNamePrefix() . 'messages.index');
    }


    public function markAllAsReadMessage(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        Message::where('messages.deleted_at', NULL)->where('receiver_id', auth()->user()->id)->update(['is_read' => 1]);
        Session::flash('flash_notice', trans('messages.messages_have_marked_as_read_successfully'));

        return redirect()->back();
    }

    public function searchGroupMember(Request $request, $groupId)
    {
        $login_user_id = auth()->user()->id;
        $findGroup  =   DB::table('groups')->leftJoin('users', 'users.id', 'groups.created_by')->where('groups.id', $groupId)
            ->where('groups.deleted_at', NULL)->select('groups.*', 'users.name as created_by_name')
            ->first();
        if (!empty($findGroup)) {
            $findGroup->group_members = GroupParticipants::where('group_participants.group_id', $findGroup->id)
                ->whereNull('group_participants.deleted_at')
                ->leftJoin('users', 'users.id', 'group_participants.user_id')
                ->where('users.name', 'like', '%' . $request->search_group_member . '%')
                ->select('group_participants.*', 'users.image', 'users.is_online', 'users.name', 'users.user_role_id')
                ->paginate(10);
            $htmlData = View("modules.messages.includes.load_group_members", ['findGroup' => $findGroup])->render();

            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['member'] = $findGroup;
            $response['data'] = $htmlData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function searchGroupFile(Request $request, $groupId)
    {
        $searchFile = $request->search_group_file;
        $findGroup  =   DB::table('groups')->leftJoin('users', 'users.id', 'groups.created_by')->where('groups.id', $groupId)
            ->where('groups.deleted_at', NULL)->select('groups.*', 'users.name as created_by_name')
            ->first();
        if (!empty($findGroup)) {
            $findGroup->group_admins = GroupParticipants::where('group_id', $groupId)->whereNull('group_participants.deleted_at')->where('group_participants.is_admin', 1)->leftJoin('users', 'users.id', 'group_participants.user_id')->pluck('users.name')->toArray();

            $findGroup->group_files = ChatUpload::leftjoin('messages', 'messages.id', 'chat_uploads.message_id')->where('messages.group_id', $groupId)->where(function ($query) use ($searchFile) {
                $query->whereNull('chat_uploads.deleted_at')
                    ->where(function ($query) use ($searchFile) {
                        $query->where(DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id)"), 'like', "%{$searchFile}%")
                            ->orWhere(DB::raw("(select name from users where messages.sender_id = users.id)"), 'like', "%{$searchFile}%");
                    });
            })->distinct('messages.sender_id')->groupBy('chat_uploads.document_id')->whereNull('chat_uploads.deleted_at')->select('chat_uploads.*', DB::raw("(select file_name from user_files where chat_uploads.document_id = user_files.id) as file_name"), DB::raw("(select file_size from user_files where chat_uploads.document_id = user_files.id) as file_size"), DB::raw("(select name from users where messages.sender_id = users.id) as sender_name"))->orderBy('chat_uploads.created_at', 'desc')->paginate(10);

            $htmlData = View("modules.messages.includes.load_group_files", ['findGroup' => $findGroup])->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['file'] = $findGroup;
            $response['data'] = $htmlData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }
}
