<?php
use App\Models\Role;
use App\Models\PendingRequest;
use App\Models\User;
use App\Models\Project;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\Group;
use App\Models\ProjectAgentPermission;
use App\Models\ProjectAgent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

function storeCrmComponentsDataIntoSession($componentName){
    if(session()->has('crmComponentsData')){
        $crmComponentsData = session()->get('crmComponentsData');

    }else{
        $crmComponentsData = [];
    }
    $totalCount = !empty($crmComponentsData[$componentName]) ? ($crmComponentsData[$componentName] + 1) : 1 ;
    $crmComponentsData[$componentName] = $totalCount ;
    session()->put('crmComponentsData',$crmComponentsData);
    return $totalCount;
}
function getUserRoleId($name){
    if(!empty($name)){
        $roleId = Role::where('name',$name)->value('id');
        return $roleId;
    }
}

function getUserRoleName($id){
    if(!empty($id)){
        $roleName = Role::where('id',$id)->value('name');
        return $roleName;
    }
}

function determineFileType($extension)
{
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff', 'webp'];
    $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'mkv', 'flv'];
    $documentExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'];

    $lowercaseExtension = strtolower($extension);

    if (in_array($lowercaseExtension, $imageExtensions)) {
        return 'image';
    } elseif (in_array($lowercaseExtension, $videoExtensions)) {
        return 'video';
    } elseif (in_array($lowercaseExtension, $documentExtensions)) {
        return 'document';
    } else {
        return 'unknown';
    }
}
function areAgentFriends($user1Id, $user2Id)
{
    // Check if there is an accepted request between the two users
    $friendshipRequest = PendingRequest::where('status', config('constant.REQUEST_STATUS.ACCEPTED'))->where(function ($query) use ($user1Id, $user2Id) {
        $query->where('from', $user1Id)->where('to', $user2Id);
    })->orWhere(function ($query) use ($user1Id, $user2Id) {
        $query->where('from', $user2Id)->where('to', $user1Id);
    })->first();

    return !empty($friendshipRequest) ? true : false;
}


function fetchNotifications(Request $request,$realtimeArr = []){
    if(!empty($realtimeArr['id'])){
        $notifications =  DB::table('notifications')->where('id',$realtimeArr['id'] ?? 0)->paginate(1);
    }else{

        $DB =  DB::table('notifications')->where('user_id',!empty(auth()->user()->id) ? auth()->user()->id : 0);

        if(!empty($request->unread)){
            $DB->where('is_read',0);
        }
        $notifications = $DB->orderBy('created_at','desc')->paginate(6);

    }

    if($notifications->isNotEmpty()){
        foreach($notifications as $notification){
            $notification->time_value = formatTimeDifference($notification->created_at);
            $currentUrlPrefix = currentRoutePrefix();
            $referrarUrlPrefix = ( $currentUrlPrefix == 'admin' ? 'agent' : 'admin');
            $notification->action_url = str_replace('/'.$referrarUrlPrefix.'/',($referrarUrlPrefix == 'admin' ? '/agent/' : '/admin/'), $notification->action_url);
            
            $valuesArr = !empty($notification->values) ? explode(',',$notification->values) : [];
            $notification->message = !empty(config('messages.'.$notification->message)) ? trans(config('messages.'.$notification->message)) : $notification->message;
            $notification->message = custom_str_replace($notification->message, $valuesArr);


            if($notification->type == 'property'){
                $notification->image_url = asset('img/default-property.jpg');
            }else if($notification->type == 'user'){
                $user = User::where('id',$notification->reference_id)->first();
                $notification->image_url = !empty($user->image) ? $user->image : asset('img/default-user.jpg');
            }else if($notification->type == 'request'){
                $user = User::where('id',$notification->reference_id)->first();
                $notification->image_url = !empty($user->image) ? $user->image : asset('img/default-user.jpg');
            }else if($notification->type == 'inquiry'){
                $user = User::where('id',$notification->reference_id)->first();
                $notification->image_url = asset('img/notification-lead.svg');  
            }
        }
    }

    if(!empty($realtimeArr['user_id'])){
        $unreadCount = DB::table('notifications')->where('user_id',!empty($realtimeArr['user_id']) ? $realtimeArr['user_id'] : 0)->where('is_read',0)->count();
    }else{
        $unreadCount = DB::table('notifications')->where('user_id',!empty(auth()->user()->id) ? auth()->user()->id : 0)->where('is_read',0)->count();
    }




    return ['data' => $notifications, 'count' => $unreadCount];

}

function fetchUserMessages(Request $request,$realtimeArr = []){
    if(!empty($realtimeArr['id'])){
        $messages =  DB::table('messages')->where('id',$realtimeArr['id'] ?? 0)->paginate(1);
    }else{

        $DB =  DB::table('messages')->where('receiver_id',!empty(auth()->user()->id) ? auth()->user()->id : 0)->whereNull('deleted_at');

        if(!empty($request->unread)){
            $DB->where('is_read',0);
        }
        $messages = $DB->orderBy('created_at','desc')->paginate(6);
    }

    if($messages->isNotEmpty()){
        // dd($messages);
        foreach($messages as $message){
            $message->time_value = formatTimeDifference($message->created_at);
            
            $senderData = User::where('id',$message->sender_id)->first();
            $message->sender_name = !empty($senderData->name) ? $senderData->name : '';
            $message->sender_role_id = !empty($senderData->user_role_id) ? $senderData->user_role_id : '';

            // Processing message and values here ()
            $valuesArr = !empty($message->values) ? explode(',', $message->values) : [];
            $message->message = !empty(config('chat_messages.'.$message->message)) ? trans(config('chat_messages.'.$message->message)) : $message->message;
            $message->message = custom_str_replace($message->message, $valuesArr);

            $message->sender_image = !empty($senderData->image) ? $senderData->image : '';
            if(!empty($message->group_id)){
                $message->group_image = Group::where('id',$message->group_id)->value('group_image');
                $message->group_name = Group::where('id',$message->group_id)->value('name');
            }
           
        }
    }
    
    if(!empty($realtimeArr['user_id'])){
        $unreadCount = DB::table('messages')->where('receiver_id',!empty($realtimeArr['user_id']) ? $realtimeArr['user_id'] : 0)->where('is_read',0)->whereNull('deleted_at')->count();
    }else{
        $unreadCount = DB::table('messages')->where('receiver_id',!empty(auth()->user()->id) ? auth()->user()->id : 0)->where('is_read',0)->whereNull('deleted_at')->count();
    }

    return ['data' => $messages, 'count' => $unreadCount];

}

function formatTimeDifference($datetime) {
    $now = new DateTime();
    $givenTime = new DateTime($datetime);
    $interval = $now->diff($givenTime);
    if ($interval->y > 0 || $interval->m > 0 || $interval->d > 1) {
        // If the difference is more than 24 hours, return the date and time
        return $givenTime->format('d/m/Y, h:i A');
    } elseif ($interval->d == 1) {
        // If the difference is exactly 24 hours, return "yesterday"
        //return 'Yesterday';
        return trans('messages.Yesterday');
    } elseif ($interval->h >= 1) {
        // If the difference is under 24 hours, return hours ago
        // return $interval->h . 'h ago';
        return $interval->h ." ". trans("messages.h_ago");
    } elseif ($interval->i > 1) {
        // If the difference is under 1 hour, return minutes ago
        // return $interval->i . ' mins ago';
        return $interval->i .' '. trans('messages.min_ago');
    } else {
        // If the difference is under 1 minute, return "just now"
        //return 'Just now';
        return trans('messages.Just_now');
    }
}

function fetchRequests(Request $request,$realtimeArr = []){
    if(!empty($realtimeArr['requestId'])){
        $requests =  PendingRequest::where('requests.id',$realtimeArr['requestId'])->leftJoin('users','users.id','requests.from')->orderBy('requests.created_at','desc')->select('requests.*','users.image as user_image','users.name as user_name')->paginate(1);
    }else{
        $requests =  PendingRequest::where('requests.to',!empty(auth()->user()->id) ? auth()->user()->id : 0)->leftJoin('users','users.id','requests.from')->orderBy('requests.created_at','desc')->select('requests.*','users.image as user_image','users.name as user_name','user_role_id')->paginate(6);

    }
    if($requests->isNotEmpty()){
        foreach($requests as $request){
            $request->user_image = !empty($request->user_image) ? Config('constant.USER_IMAGE_URL').$request->user_image : asset('img/default-user.jpg'); ;

        }
    }
    if(!empty($realtimeArr['user_id'])){
        $pendingCount = DB::table('requests')->where('to',!empty($realtimeArr['user_id'] ) ? $realtimeArr['user_id']  : 0)->where('status',config('constant.REQUEST_STATUS.PENDING'))->count();
    }else{
        $pendingCount = DB::table('requests')->where('to',!empty(auth()->user()->id) ? auth()->user()->id : 0)->where('status',config('constant.REQUEST_STATUS.PENDING'))->count();
    }


    return ['data' => $requests, 'count' => $pendingCount];

}

// function custom_str_replace($message, $values = [])
// {
//     foreach ($values as $key => $value) {
//         $message = str_replace('{' . $key . '}', $value, $message);
//     }

//     return $message;
// }
function custom_str_replace($message, $values = [])
{
    if(!empty($values)){
        foreach ($values as $key => $value) {
            // dd($value);
            $message = preg_replace('/{value}/', $value, $message, 1);
           
        }
    }
    
    return $message;
}

function custom_str_replace_recent_activity_project($message, $values = [])
{
    if(!empty($values)){
        foreach ($values as $key => $value) {
            
            $message = preg_replace('/{value}/', '<span class="font-weight-700 color-b-blue">'.str_replace('||',', ',$value).'</span>', $message, 1);
           
        }
    }
    
    return $message;
}
function getLanguages()
{
    $languages =Language::where('lang_code','!=','fr')->get();

    return $languages;
}

function getLoggedInUserNameHeader()
{
    $user = User::where('id',Auth::user()->id)->first();
    return $user;
}

function routeNamePrefix(){

    if(auth()->check()){

        if(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin'){
            return 'admin-';
        }else if(auth()->user()->role->name == 'customer'){
            return 'customer-';
        }else if(auth()->user()->role->name == 'agent'){
            return 'agent-';
        }else if(auth()->user()->role->name == 'sub-agent'){
            return 'sub-agent-';
        }else if(auth()->user()->role->name == 'sub-developer'){
            return 'sub-developer-';
        }else if(auth()->user()->role->name == 'developer'){
            return 'developer-';
        }
    }
}
function currentRoutePrefix(){

    if(auth()->check()){

        if(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin'){
            return 'admin';
        }else if(auth()->user()->role->name == 'customer'){
            return 'customer';
        }else if(auth()->user()->role->name == 'agent' ){
            return 'agent';
        }else if(auth()->user()->role->name == 'sub-agent' ){
            return 'sub-agent';
        }else if(auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer' ){
            return 'developer';
        }
    }
}

function getStates(Request $request)
{
    $filePath = public_path('assets/data/countries_states.json');
    if (file_exists($filePath)) {
        $jsonContent = file_get_contents($filePath);
        $data = json_decode($jsonContent, true);
        return $data['states'];
    }
}

function getcities(Request $request)
{
    $filePath = public_path('assets/data/citiesByState.json');
    if (file_exists($filePath)) {
        $jsonContent = file_get_contents($filePath);
        $data = json_decode($jsonContent, true);
        
        // Filter cities based on selected state
        $filteredCities = array_filter($data['cities'], function($city) use ($request) {
            return $city['states'] == $request->state;
        });
        
        return response()->json($filteredCities);
    } else {
        return response()->json(['error' => 'File not found']);
    }
}




function requestSegment($segment){
    $segment = $segment + 1;
    return request()->segment($segment);

}

function getFileUrl($fileName, $directory)
{
    $fileUrl = "";
    if($directory == 'users'){
        $fileUrl = (!empty($fileName) && File::exists(Config('constant.USER_IMAGE_ROOT_PATH') . $fileName)) ? config('constant.USER_IMAGE_URL').$fileName : asset('img/default-user.jpg');
    }elseif($directory == 'user_certificates'){
        $fileUrl = (!empty($fileName) && File::exists(Config('constant.USER_CERTIFICATE_ROOT_PATH') . $fileName)) ? config('constant.USER_CERTIFICATE_URL').$fileName : '';
    }elseif($directory == 'event_attachments'){
        $fileUrl = (!empty($fileName) && File::exists(Config('constant.EVENT_ATTACHMENT_ROOT_PATH') . $fileName)) ? config('constant.EVENT_ATTACHMENT_URL').$fileName : '';
    }elseif($directory == 'properties'){
        $fileUrl = (!empty($fileName) && File::exists(Config('constant.PROPERTY_IMAGE_ROOT_PATH') . $fileName)) ? config('constant.PROPERTY_IMAGE_URL').$fileName : asset('img/default-property.jpg');
    }elseif($directory == 'groups'){
        $fileUrl = (!empty($fileName) && File::exists(Config('constant.GROUP_IMAGE_ROOT_PATH') . $fileName)) ? config('constant.GROUP_IMAGE_URL').$fileName : asset('img/chat_default_group.jpg');
    }elseif($directory == 'files'){
        $fileUrl = (!empty($fileName) && File::exists(Config('constant.USER_FILE_ROOT_PATH') . $fileName)) ? config('constant.USER_FILE_URL').$fileName : asset('img/default-user.jpg');
    }elseif($directory == 'developments'){
        $fileUrl = (!empty($fileName) && File::exists(Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH') . $fileName)) ? config('constant.DEVELOPMENT_IMAGE_URL').$fileName : asset('img/default-user.jpg');
    }elseif($directory == 'user_company_details'){
        $fileUrl = (!empty($fileName) && File::exists(Config('constant.COMPANY_IMAGE_ROOT_PATH') . $fileName)) ? config('constant.COMPANY_IMAGE_URL').$fileName : asset('img/default-user.jpg');
    }
    return $fileUrl;
}
function getModalSpecificData($className, $variableName, $key = "") {
    $class = "\\App\\Models\\$className";
    if (class_exists($class) && defined("$class::$variableName")) {
        $variable = constant("$class::$variableName");
        if (!empty($key) && is_array($variable)) {
            return isset($variable[$key]) ? $variable[$key] : null;
        } else {
            if($className=='Project'){
                if(!empty($variable) && is_array($variable)){
                    foreach($variable as $variableKey => &$variableVal){
                       $variable[$variableKey] = trans('messages.'.$variableVal);
                    }
                }
            }
            return $variable;
        }
    }
    return null;
}

function formatFileSize($sizeInBytes, $precision = 2)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];

    $size = $sizeInBytes;
    $unit = 0;

    while ($size >= 1024 && $unit < count($units) - 1) {
        $size /= 1024;
        $unit++;
    }

    return round($size, $precision) . ' ' . $units[$unit];
}

function formatFileSizeFromKB($sizeInKB, $precision = 2)
{
    $units = ['KB', 'MB', 'GB', 'TB'];

    $size = $sizeInKB;
    $unit = 0;

    while ($size >= 1024 && $unit < count($units)) {
        $size /= 1024;
        $unit++;
    }

    return round($size, $precision) . ' ' . $units[$unit];
}


if (!function_exists('getSlugText')) {
    /**
     * Get Slug
     *
     * @param string $title
     * @param $model
     * @return string
     */
    function getSlugText($title, $model)
    {
        $slug = Str::slug($title);
        if ($slug == '') {
            $slug = 1;
        }
        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
        $slug =  ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
        return $slug;
    }
}

function getFileSizeLimit($withSizeName = false){
    $loggedInUserRole = auth()->user()->role->name;
    
    $storageSize = config('Modules.'.$loggedInUserRole.'_role_storage_size');

    if($withSizeName){
        $storageSize = formatFileSizeFromKB($storageSize);
        return $storageSize;
    }else{

        return $storageSize;
    }
}

function formatFileSizeFlexible($size, $sizeType, $outputSizeType,$withText = false, $precision = 2)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];

    // Validate input size type and output size type
    if (!in_array($sizeType, $units) || !in_array($outputSizeType, $units)) {
        return 'Invalid size type';
    }

    // Convert input size to bytes
    $baseSize = convertToBytes($size, $sizeType);

    // Convert bytes to the desired output size type
    $convertedSize = $baseSize;
    $fromIndex = array_search('B', $units);
    $toIndex = array_search($outputSizeType, $units);

    if ($fromIndex !== false && $toIndex !== false) {
        $multiplier = pow(1024, $toIndex - $fromIndex);
        $convertedSize /= $multiplier;
    }
    if($withText){

        return round($convertedSize, $precision) . ' ' . $outputSizeType;
    }else{
        return round($convertedSize, $precision); 
    }
}
function convertToBytes($size, $sizeType)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];

    // Validate size type
    if (!in_array($sizeType, $units)) {
        return 0;
    }

    $fromIndex = array_search($sizeType, $units);
    $baseSize = floatval($size);

    if ($fromIndex !== false) {
        $multiplier = pow(1024, $fromIndex);
        $baseSize *= $multiplier;
    }

    return $baseSize;
}


if (!function_exists('getGroupNumber')) {
    /**
     * Get Slug
     *
     * @param string $title
     * @param $model
     * @return string
     */
    function getGroupNumber()
    {
        // Static string
        $grpStr = "IMCG";
        
        // Generate two random digits
        $randomDigits = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);
        $lastGroupId = Group::latest('id')->first()->id ?? 0;
        // Combine the static string, random digits, and last group ID
        $groupNumber = $grpStr . $randomDigits . $lastGroupId;
        
        return $groupNumber;
    }
}

function checkUserProjectPermissions($projectId,$permissionName){
    $loggedInUserId = auth()->user()->id;
    $projectAgentPermissionInstance = new ProjectAgentPermission();
    $projectAgentInstance = new  ProjectAgent();
    $projectAgentDetails = $projectAgentInstance->loadProjectAgents(['singleRecord' => true,'projectId' => $projectId, 'agentId' => $loggedInUserId,'userId' => $loggedInUserId ],[],[]);
    if(auth()->user()->role->name != 'superadmin'){
        if(!empty($projectAgentDetails)){
            $checkIfThisUserHasThisPermission = $projectAgentPermissionInstance->loadProjectAgentPermission(['singleRecord' => true,'projectId' => !empty($projectId) ? $projectId : 0, 'agentId' => $projectAgentDetails->id,'userId' => $loggedInUserId , 'permissionName' => $permissionName],[],[]);
     
                if(!empty($checkIfThisUserHasThisPermission)){
                    return true;
                }else{
                    return false;
                }
            
        }else{
            return false;
        }
    }else{
        return true;
    }
 
}
function getShortName($name)
{
    $words = explode(' ', $name);
    
    $initials = '';

    foreach ($words as $word) {
        $initials .= strtoupper(substr($word, 0, 1));
    }

    return $initials;
}

if (!function_exists('findSpecificRecordData')) {
    /**
     * Function to find a record from a specified model and return specific columns.
     *
     * @param string|Model $model The Eloquent model class or instance
     * @param array $conditions The where conditions to find the record. Example: ['id' => 1]
     * @param array|string $columns The column(s) to be retrieved. Example: ['name', 'email'] or 'name'
     * @return mixed|null The value of the column(s) or null if no record is found
     */
    function findSpecificRecordData($model, array $conditions, $columns = ['*'])
    {
        // Check if the model is passed as a class name (string) or as an instance
        if (is_string($model)) {
            // Fully qualify the model class
            if (!class_exists($model)) {
                throw new \Exception("Model class {$model} not found.");
            }
            // Create an instance of the model
            $modelInstance = new $model;
        } elseif ($model instanceof Model) {
            $modelInstance = $model;
        } else {
            throw new \Exception("Invalid model type provided.");
        }
        // Ensure the columns exist in the table schema
        if (is_array($columns) && $columns !== ['*']) {
            $columns = array_filter($columns, function($column) use ($modelInstance) {
                return Schema::hasColumn($modelInstance->getTable(), $column);
            });
        }

        // Find the record with the given conditions
        $record = $modelInstance->where($conditions)->first($columns);

        // If record is found
        if ($record) {
            // If a single column is requested, return the value directly
            if (is_string($columns)) {
                return $record->$columns;
            } elseif (is_array($columns) && count($columns) === 1) {
                return $record->{$columns[0]};
            }

            // Otherwise, return the array of selected columns
            return $record->toArray();
        }

        // Return null if no record is found
        return null;
    }
}