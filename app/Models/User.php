<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use File, DB;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'signature',
        'password',
        'user_role_id',
        'email_verified_at',
        'preferred_locale',
        'current_status',
        'government_certification',
        'doc_type',
        'original_doc_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    const FIRST_STEP = 'first_step';
    const SECOND_STEP = 'second_step';
    const LAST_STEP = 'last_step';
    const COMPLETED = 'completed';
    const qualification_type = [
        'Engineer' => 'Engineer',
        'Architecture' => 'Architecture',
        'Secretary' => 'Secretary'
    ];

    public function socialUsers()
    {
        return $this->hasMany(SocialUser::class);
    }

    public static function getImageAttribute($value = "")
    {
        if ($value != "" && File::exists(Config('constant.USER_IMAGE_ROOT_PATH') . $value)) {
            $value = Config('constant.USER_IMAGE_URL') . $value;
        } else if ($value != "" && File::exists(Config('constant.USER_IMAGE_STORE_PATH') . $value)) {
            $value = Config('constant.USER_IMAGE_URL') . $value;
        } else {
            // $value = asset('img/default-user.jpg');
            $value = '';
        }
        return $value;
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'user_role_id', 'id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'user_property_features')
            ->withPivot('is_active');
    }

    public function loadUserConnectedUsersData($data, $requestData, $requiredData = [])
    {
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = User::leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id');
        if (auth()->user()->role->name != 'superadmin' && auth()->user()->role->name != 'admin') {
            $userData->leftJoin('requests', function ($join) use ($loggedInUserId) {
                $join->on('users.id', '=', 'requests.to')
                    ->where('requests.from', '=', $loggedInUserId)
                    ->orWhere(function ($query) use ($loggedInUserId) {
                        $query->on('users.id', '=', 'requests.from')
                            ->where('requests.to', '=', $loggedInUserId);
                    });
            })->where(function ($query) use ($loggedInUserId) {
                $query->where('requests.status', config('constant.REQUEST_STATUS.ACCEPTED'))
                    ->orWhere('user_roles.name', 'superadmin')
                    ->orWhere('user_roles.name', 'admin');
            });
        }

        if (!empty($data['userRoleName']) && ($data['userRoleName'] != 'both')) {
            $userData->where('user_roles.name', '=', $data['userRoleName']);
        }
        if (!empty($data['selectedProjectCustomers'])) {
            $userData->whereIn('users.id', $data['selectedProjectCustomers']);
        }
        if (!empty($data['selectedProjectAgents'])) {
            $userData->whereIn('users.id', $data['selectedProjectAgents']);
        }

        if (!empty($requestData['search_input_user'])) {
            $searchData = $requestData['search_input_user'];
            $userData->where(function ($query) use ($searchData) {
                $query->Orwhere("users.name", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("users.email", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("users.phone", "LIKE", "%" . $searchData . "%");
            });
        }
        $userData->where('users.id', '!=', $loggedInUserId)->whereNull('users.deleted_at')->where('users.is_active', 1)->whereNotNull('users.email_verified_at')->orderBy('users.created_at', 'desc');


        $userData->select('users.*', DB::raw('(SELECT max_price FROM user_property_preferences WHERE user_id = users.id ORDER BY created_at LIMIT 1) as max_price'), DB::raw('(SELECT count(id) FROM properties WHERE owner_id = users.id and deleted_at is NULL) as total_properties'))->groupBy('users.id');

        if (!empty($data['perPage'])) {
            $results = $userData->paginate($data['perPage']);
        } else {
            $results = $userData->get();
        }

        if(!is_array($results) && !is_numeric($results) && (is_a($results, 'Illuminate\Database\Eloquent\Collection') ? $results->isNotEmpty() : !empty($results)) && !empty($requiredData) && empty($data['fetchCount']) && empty($data['pluck'])){
            foreach ($results as $result) {
                if (in_array('agent_permissions', $requiredData)) {
                    $projectAgentInstance = new  ProjectAgent();
                    $projectAgentDetails = $projectAgentInstance->loadProjectAgents(['singleRecord' => true, 'projectId' => !empty($data['projectId']) ? $data['projectId'] : 0, 'agentId' => $result->id, 'userId' => $loggedInUserId], [], []);

                    if (!empty($projectAgentDetails)) {
                        // print_r( $projectAgentDetails->id);die;
                        $projectAgentPermissionInstance = new ProjectAgentPermission();
                        $result->agent_permissions = $projectAgentPermissionInstance->loadProjectAgentPermission(['pluck' => 'project_permissions.permission_name', 'projectId' => !empty($data['projectId']) ? $data['projectId'] : 0, 'agentId' => $projectAgentDetails->id, 'userId' => $loggedInUserId], [], []);
                    }
                }
            }
        }

        return $results;
    }
    // public function companyDetails()
    // {
    //     // $this->loadMissing('role');

    //     print_r($this->id);die;
    //     $roleName = $this->role ? $this->role->name : null;
    //     if ($roleName === 'agent' || $roleName === 'developer') {
    //         return $this->hasOne(userCompanyDetail::class, 'user_id', 'id');
    //     } else {
    //         return $this->hasOne(userCompanyDetail::class, 'user_id', 'parent_user_id');
    //     }
    // }
    public function getCompanyDetailsAttribute()
    {
        $roleName = $this->role ? $this->role->name : null;
        $foreignKey = ($roleName === 'agent' || $roleName === 'developer') ? 'id' : 'parent_user_id';

        return $this->hasOne(userCompanyDetail::class, 'user_id', $foreignKey)->first();
    }



    public function userRoles()
    {
        return $this->hasOne(Role::class, 'id', 'user_role_id');
    }
    public function loadDevelopoers($data, $requestData, $requiredData)
    {
        // dd($requestData);
        $developers = User::whereHas('userRoles', function ($q) {
            $q->where('name', 'developer');
        });
        if (!empty($requestData['sort_by_developer'])) {
            if ($requestData['sort_by_developer'] == 'newest') {
                $developers->orderBy('users.created_at', 'desc');
            } else if ($requestData['sort_by_developer'] == 'oldest') {
                $developers->orderBy('users.created_at', 'asc');
            }
        } else {
            $developers->orderBy('users.created_at', 'desc');
        }

        if (!empty($requestData['search_input_developer'])) {
            $searchData = $requestData['search_input_developer'];
            $developers->leftJoin('user_company_details', function ($join) {
                $join->on('user_company_details.user_id', '=', \DB::raw("(CASE
                    WHEN users.user_role_id IN (SELECT id FROM user_roles WHERE name IN ('agent', 'developer'))
                    THEN users.id
                    ELSE users.parent_user_id
                END)"));
            });
            $developers->where(function ($query) use ($searchData) {
                $query->where("user_company_details.company_name", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("users.name", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("users.phone", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("users.city", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("users.created_at", "LIKE", "%" . $searchData . "%");
            });
        }

        $developers->whereNull('users.deleted_at');
        if (!empty($data['perPage'])) {
            $results = $developers->groupBy('users.id')->select('users.*')->paginate($data['perPage']);
        } elseif (!empty($data['fetchCount'])) {
            $results = $developers->count();
        } else {
            $results = $developers->groupBy('users.id')->select('users.*')->get();
        }

        return $results;
    }

    public function loadUserMembers($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userDetails = !empty($data['userId']) ? User::find($data['userId']) : [];
        $users = User::with('userPropertyPreference');
        if(!empty($requestData['table_search_input'])){
            $searchData = $requestData['table_search_input'];
            $users->where(function ($query) use($searchData){
                $query->Orwhere("users.name","LIKE","%".$searchData."%");
                $query->Orwhere("users.email","LIKE","%".$searchData."%");
                $query->Orwhere("users.phone","LIKE","%".$searchData."%");
            });
        }
        if(!empty($data['user_role_id'])){
            // $users->where('users.user_role_id', $data['user_role_id']);
            $users->where(function($query) use ($data,$userDetails) {
                $query->where('users.user_role_id', $data['user_role_id'])
                      ->orWhere('users.id', !empty($userDetails->id) ? $userDetails->id : 0);
             });
        }

        if(!empty($data['userIds'])){
            $users->whereIn('users.parent_user_id',$data['userIds']);
        }

        if(!empty($data['recordId'])){
            $users->where('users.id',$data['recordId']);
        }

        if(!empty($data['withSelf']) && !empty($data['userId'])){
            $users->where(function($query) use ($data) {
                $query->where('users.parent_user_id', $data['userId'])
                      ->orWhere('users.id', $data['userId']);
             });

        }else if(!empty($data['userId'])){
            $users->where('users.parent_user_id',$data['userId'] );
        }
        
        if(isset($data['is_active']) &&  $data['is_active'] == 1 ){
            $users->where('users.is_active',1 )->where('users.current_status','completed');
        }elseif(isset($data['is_active']) &&  $data['is_active'] == 0 ){
            $users->where('users.is_active',0 )->where('users.current_status','!=','completed');
        }

        $users->whereNull('users.deleted_at')->whereNotNull('users.email_verified_at');

        if (!empty($requestData['sortBy'])) {
            if ($requestData['sortBy'] == 'newest') {
                $users->orderBy('users.created_at', 'desc');
            } else if ($requestData['sortBy'] == 'oldest') {
                $users->orderBy('users.created_at', 'asc');
            }
        } else {
            $users->orderBy('users.created_at', 'desc');
        }


        if(!empty($data['perPage'])){
            $results = $users->select('users.*',DB::raw('(SELECT name from users as users_added_by WHERE id = users.parent_user_id LIMIT 1 ) as added_by_name'))->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $users->count();
        }elseif(!empty($data['pluck'])){
            $results = $users->pluck($data['pluck'])->toArray();
        }elseif(!empty($data['singleRecord'])){
            $results = $users->select('users.*',DB::raw('(SELECT name from users as users_added_by WHERE id = users.parent_user_id LIMIT 1 ) as added_by_name'))->first();

        }else{
            $results = $users->get();
        }

        if(!is_array($results) && !is_numeric($results) && (is_a($results, 'Illuminate\Database\Eloquent\Collection') ? $results->isNotEmpty() : !empty($results)) && !empty($requiredData) && empty($data['fetchCount']) && empty($data['pluck'])){
            if (!empty($data['singleRecord'])) {
                if (in_array('user_permissions', $requiredData)) {
                    $userPermissionAccessInstance = new UserPermissionAccess();
                    $results->user_permissions = $userPermissionAccessInstance->loadUserPermissionAccessData(
                        ['pluck' => 'user_permissions.permission_name', 'userId' => $results->id],
                        [],
                        []
                    );
                }
            } else {
                // Otherwise, loop through the collection of results.
                foreach ($results as $result) {
                    if (in_array('user_permissions', $requiredData)) {
                        $userPermissionAccessInstance = new UserPermissionAccess();
                        $result->user_permissions = $userPermissionAccessInstance->loadUserPermissionAccessData(
                            ['pluck' => 'user_permissions.permission_name', 'userId' => $result->id],
                            [],
                            []
                        );
                    }
                }
            }
        }

        return $results;
    }

    public function development()
    {
        return $this->belongsTo(Development::class, 'id', 'user_id');
    }
    public function userPropertyPreference()
    {
        return $this->belongsTo(UserPropertyPreference::class, 'id', 'user_id');
    }

    public function userPropertyFeature()
    {
        return $this->hasMany(UserPropertyFeature::class, 'user_id','id');
    }
}
