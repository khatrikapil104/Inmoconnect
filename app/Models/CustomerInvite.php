<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class CustomerInvite extends Model
{
    use HasFactory,SoftDeletes;

    const STATUS = [
        'active' => 'customer_active',
        'inactive' => 'customer_inactive'
    ];

    public function loadCustomerInvites($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $customerInvites = CustomerInvite::query();
        if(!empty($requestData['table_search_input'])){
            $searchData = $requestData['table_search_input'];
            $customerInvites->where(function ($query) use($searchData){
                $query->Orwhere("customer_invites.name","LIKE","%".$searchData."%");
                $query->Orwhere("customer_invites.email","LIKE","%".$searchData."%");
                $query->Orwhere("customer_invites.phone","LIKE","%".$searchData."%");
            });
        }
        if(auth()->user()->role->name == 'agent'){

            $customerInvites->where('customer_invites.invited_by', $loggedInUserId);
        }
        
        $customerInvites->whereNull('customer_invites.deleted_at')
            ->select('customer_invites.*', DB::raw('(SELECT last_login FROM users WHERE customer_invites.user_id = users.id LIMIT 1) AS last_login'))->groupBy('customer_invites.id');
        
        if(!empty($data['perPage'])){
            $results = $customerInvites->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $customerInvites->count();
        }else{
            $results = $customerInvites->get();
        }
        
        return $results; 
    }

    public function getCustomerInviteDetails($id,$requiredData = []){

        $result = CustomerInvite::with('userPropertyPreference.userPropertyCategory','user')->where('customer_invites.id',$id)->whereNull('customer_invites.deleted_at')
        ->first();
        return $result;
    }

    public function userPropertyPreference()
    {
        return $this->belongsTo(UserPropertyPreference::class, 'user_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
   
}
