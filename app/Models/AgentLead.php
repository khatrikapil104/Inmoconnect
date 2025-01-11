<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentLead extends Model
{
    use HasFactory;

    public function loadLeadUser($data, $requestData, $loggedInUserId )
    {
        $loadLeadUser = AgentLead::with('propertyDetail')->where('agent_id',$loggedInUserId);
        if (!empty($requestData['sortBy'])) {
            if ($requestData['sortBy'] == 'high_low') {
                $loadLeadUser->leftJoin('properties', 'properties.id', '=', 'agent_leads.property_id')
                 ->orderBy('properties.price', 'desc');
            } 
            else if ($requestData['sortBy'] == 'low_high') {
                $loadLeadUser->leftJoin('properties', 'properties.id', '=', 'agent_leads.property_id')
                 ->orderBy('properties.price', 'asc');
            } 
             if ($requestData['sortBy'] == 'newest') {
                $loadLeadUser->orderBy('agent_leads.created_at', 'desc');
            } else if ($requestData['sortBy'] == 'oldest') {
                $loadLeadUser->orderBy('agent_leads.created_at', 'asc');
            }
        } else {
            $loadLeadUser->orderBy('agent_leads.created_at', 'desc');
        }
        if (!empty($requestData['table_search_input'])) {
            $searchData = $requestData['table_search_input'];
            $loadLeadUser->where(function ($query) use ($searchData) {
                $query->whereAny(['name', 'account_type', 'city'], 'LIKE', "%$searchData%");
                $query->orWhereHas('propertyDetail', function ($q) use ($searchData) {
                    $q->whereAny(['name', 'reference', 'price'], 'LIKE', "%$searchData%");
                });
            });
        }
        $loadLeadUser->select('agent_leads.*')->groupBy('agent_leads.id');

        if (!empty($data['perPage'])) {
            $results = $loadLeadUser->paginate($data['perPage']);
        } elseif (!empty($data['fetchCount'])) {
            $results = $loadLeadUser->count();
        } else {
            $results = $loadLeadUser->get();
        }

        return $results;
    }

    public function propertyDetail()
    {
        return $this->belongsTo(NewProperty::class, 'property_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function userPropertyPreferences()
    {
        return $this->belongsTo(UserPropertyPreference::class, 'user_id', 'user_id');
    }
}
