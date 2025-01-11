<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session, DB;
use App\Models\Type;
use App\Models\Property;
use App\Models\Category;
use App\Models\Role;
use App\Models\Notification;
use App\Models\Message;
use App\Models\ProjectRecentActivity;
use App\Models\UserPermissionAccess;
use App\Models\UserRolePermissionAccess;
use App\Models\UserPermission;
use App\Models\UserRecentActivity;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
       
    }
    public function change_error_msg_layout($errors = array())
    {
        $response = array();
        $response["status"] = "error";
        if (!empty($errors)) {
            $error_msg = "";
            foreach ($errors as $errormsg) {
                $error_msg1 = (!empty($errormsg[0])) ? $errormsg[0] : "";
                $error_msg .= $error_msg1 . ", ";
            }
            $response["msg"] = trim($error_msg, ", ");
        } else {
            $response["msg"] = "";
        }
        $response["data"] = (object) array();
        $response["errors"] = $errors;
        return $response;
    }
    public function change_error_msg_layout_custom($errors = [])
    {
        $response = [];
        $response["status"] = "error";
        $errorMessages = [];

        if (!empty($errors)) {
            foreach ($errors as $key => $messages) {
                // Format the key to use square brackets, e.g., uploadedPropertiesData.0.reference -> uploadedPropertiesData[0][reference]
                $formattedKey = preg_replace('/\.(\d+)\./', '[$1][', $key) . ']';

                // Include each error message for the formatted key
                foreach ($messages as $message) {
                    $errorMessages[] = "$formattedKey: $message";
                }
            }
        }

        $response["msg"] = implode(', ', $errorMessages);
        $response["data"] = (object) [];
        $response["errors"] = $errors; // You can keep original errors as well if needed

        return $response;
    }

    public function change_error_msg_layout_with_array($errors = array())
    {
        $response = array();
        $response["status"] = "error";
        if (!empty($errors)) {
            $error_msg = "";
            foreach ($errors as $errormsg) {
                $error_msg1 = (!empty($errormsg[0])) ? $errormsg[0] : "";
                $error_msg .= $error_msg1 . ", ";
            }
            $response["msg"] = trim($error_msg, ", ");
        } else {
            $response["msg"] = "";
        }
        $response["data"] = array();
        $response["errors"] = $errors;
        return $response;
    }

    public function getFilterData($filterName)
    {
        $filterData = [];
        if ($filterName == 'propertyListingFilterData') {
            $filterData['types']      = Type::pluck('name', 'id');
            $filterData['statesArr'] = Property::orderBy('state', 'asc')->distinct('state')->pluck('state', 'state');
            $filterData['maxPriceAndSize'] = Property::whereNull('deleted_at')->select(DB::raw('max(price) as max_price'), DB::raw('max(size) as max_size'))->first();
        } elseif ($filterName == 'propertySearchFilterData') {
            $filterData['types']      = Type::pluck('name', 'id');
            $filterData['statesArr'] = Property::orderBy('state', 'asc')->distinct('state')->pluck('state', 'state');
            $filterData['maxPriceAndSize'] = Property::whereNull('deleted_at')->select(DB::raw('max(price) as max_price'), DB::raw('max(size) as max_size'))->first();
        } elseif ($filterName == 'agentListingFilterData') {
            $filterData['types']      = Type::pluck('name', 'id');
            $filterData['categories'] = Category::pluck('name', 'id');
        } elseif ($filterName == 'agentSearchFilterData') {
            $filterData['types']      = Type::pluck('name', 'id');
            $filterData['categories'] = Category::pluck('name', 'id');
        } elseif ($filterName == 'userListingFilterData') {
            $filterData['roles']      = Role::pluck('name', 'id');
        }
        return $filterData;
    }

    function generateTimeArray()
    {
        $startTime = Carbon::parse('08:00');
        $endTime = Carbon::parse('19:30');
        $interval = 30; // in minutes

        $timeArray = [];

        while ($startTime->lt($endTime)) {
            $formattedTime = $startTime->format('H:i');
            $formattedKey = $startTime->format('H:i:s');

            $timeArray[$formattedKey] = $formattedTime;

            $startTime->addMinutes($interval);
        }

        return $timeArray;
    }

    function getCurrentMonthDaysDateArr()
    {
        $currentMonth = date('n'); // Get the current month as a number (1-12)
        $currentYear = date('Y'); // Get the current year
        $daysInMonth = date('t', strtotime(date('Y-m'))); // Get the number of days in the current month
        if ($currentYear % 4 == 0) {
            $currentYearDay = 366;
        }
        else{
            $currentYearDay = 365;
        }
        $dataArray = [];

        // Loop through each day of the month
        for ($day = 1; $day <= $currentYearDay; $day++) {
            $timestamp = mktime(0, 0, 0, $currentMonth, $day, $currentYear);
            $dayName = date('D', $timestamp); // Get the abbreviated day name (e.g., Mon, Tue)
            $date = date('d', $timestamp); // Get the date (e.g., 01, 02)
            $fullDate = date('Y-m-d', $timestamp); // Get the full date (e.g., 2024-03-01)

            // Store the data in the array
            $dataArray[] = [
                'dayName' => $dayName,
                'date' => $date,
                'fullDate' => $fullDate
            ];
        }
        return $dataArray;
    }

    function saveMessageData($messageData = [])
    {
        //dd('darshini');
        if (!empty($messageData)) {
            $obj   =  new Message;
            $obj->group_id   = !empty($messageData['group_id']) ? $messageData['group_id'] : 0;
            $obj->message_id   = !empty($messageData['message_id']) ? $messageData['message_id'] : 0;
            $obj->sender_id   = !empty($messageData['sender_id']) ? $messageData['sender_id'] : 0;
            $obj->receiver_id   = !empty($messageData['receiver_id']) ? $messageData['receiver_id'] : 0;
            $obj->message   = !empty($messageData['message']) ? $messageData['message'] : NULL;
            $obj->is_read   = !empty($messageData['is_read']) ? $messageData['is_read'] : 0;
            $obj->is_upload   = !empty($messageData['is_upload']) ? $messageData['is_upload'] : 0;
            $obj->message_type   = !empty($messageData['message_type']) ? $messageData['message_type'] : NULL;
            $obj->values   = !empty($messageData['values']) ? implode(',', $messageData['values']) : NULL;
            $obj->save();
        }
    }

    public function array_msort($array, $cols)
    {
        $colarr = array();
        foreach ($cols as $col => $order) {
            $colarr[$col] = array();
            foreach ($array as $k => $row) {
                $colarr[$col]['_' . $k] = strtolower($row[$col]);
            }
        }
        $eval = 'array_multisort(';
        foreach ($cols as $col => $order) {
            $eval .= '$colarr[\'' . $col . '\'],' . $order . ',';
        }
        $eval = substr($eval, 0, -1) . ');';
        eval($eval);
        $ret = array();
        foreach ($colarr as $col => $arr) {
            foreach ($arr as $k => $v) {
                $k = substr($k, 1);
                if (!isset($ret[$k])) $ret[$k] = $array[$k];
                $ret[$k][$col] = $array[$k][$col];
            }
        }
        return $ret;
    }


    function saveProjectRecentActivity($recentActivityData = [])
    {
        if (!empty($recentActivityData)) {
            $obj   =  new ProjectRecentActivity;
            $obj->project_id   = !empty($recentActivityData['project_id']) ? $recentActivityData['project_id'] : 0;
            $obj->activity   = !empty($recentActivityData['activity']) ? $recentActivityData['activity'] : Null;
            $obj->values   = !empty($recentActivityData['values']) ? implode(',', $recentActivityData['values']) : NULL;
            $obj->type   = !empty($recentActivityData['type']) ? $recentActivityData['type'] : NULL;

            $obj->save();
        }
    }

    function saveTeamRecentActivity($recentActivityData = [])
    {
        if (!empty($recentActivityData)) {
            $obj   =  new UserRecentActivity();
            $obj->company_id   = !empty($recentActivityData['company_id']) ? $recentActivityData['company_id'] : NULL;
            $obj->activity   = !empty($recentActivityData['activity']) ? $recentActivityData['activity'] : Null;
            $obj->values   = !empty($recentActivityData['values']) ? implode(',', $recentActivityData['values']) : NULL;
            $obj->type   = !empty($recentActivityData['type']) ? $recentActivityData['type'] : NULL;

            $obj->save();
        }
    }


    function putUserPermissionDataIntoSession(){
        
        $routeNamesArr = [];
        $userRolePermissions = UserRolePermissionAccess::where('user_role_permission_access.user_role_id',auth()->user()->user_role_id)->leftJoin('user_permissions','user_permissions.id','user_role_permission_access.user_permission_id_restrict')->select('user_permissions.route_names')->get();
        if($userRolePermissions->isNotEmpty()){
            foreach($userRolePermissions as $permission){
                $decodedRoutes = json_decode($permission->route_names, true);
                if (is_array($decodedRoutes)) {
                    $routeNamesArr = array_merge($routeNamesArr, $decodedRoutes);
                }
            }
        }

        if(auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer' ){

            $specificUserPermissionsArr = UserPermissionAccess::where('user_id',auth()->user()->id)->pluck('user_permission_id')->toArray();
            // if(!empty($specificUserPermissionsArr)){
                $userPermissionsData = UserPermission::where('is_team_management_permission',1)->whereNotIn('id',!empty($specificUserPermissionsArr) ? $specificUserPermissionsArr : [])->select('user_permissions.route_names')->get();
                if($userPermissionsData->isNotEmpty()){
                    foreach($userPermissionsData as $permissionD){
                        $decodedRoutes = json_decode($permissionD->route_names, true);
                        if (is_array($decodedRoutes)) {
                            $routeNamesArr = array_merge($routeNamesArr, $decodedRoutes);
                        }
                    }
                }
                // }
        }
            
            $routeNamesArr = array_unique($routeNamesArr);
            $routeNamePrefix = routeNamePrefix();
            $routeNamesArr = array_map(function($value) use ($routeNamePrefix) {
                return $routeNamePrefix . $value;
            }, $routeNamesArr);
        session()->put('user_permissions_arr',$routeNamesArr);
    }
}
