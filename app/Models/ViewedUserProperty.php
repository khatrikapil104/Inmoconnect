<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewedUserProperty extends Model
{
    use HasFactory;

    public function storeDetails($propertyId)
    {
        if (auth()->user()->role->name == 'customer') {
            $obj            =   new ViewedUserProperty;
            $obj->user_id   =   auth()->user()->id;
            $obj->property_id   =   $propertyId;
            $obj->save();
        }
    }


    public function loadViewedPropertiesByUserId($data, $requestData)
    {
        // dd($data, $requestData);
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userProperties = ViewedUserProperty::leftJoin('properties', 'properties.id', 'viewed_user_properties.property_id');

        $userProperties->orderBy('viewed_user_properties.created_at', 'desc');

        if (!empty($requestData['search_input_property'])) {
            $searchData = $requestData['search_input_property'];
            $userProperties->where(function ($query) use ($searchData) {
                $query->Orwhere("properties.name", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("properties.reference", "LIKE", "%" . $searchData . "%");
                $query->Orwhere("properties.price", $searchData);
            });
        }
        $userProperties->where('viewed_user_properties.user_id', $loggedInUserId)->whereNull('properties.deleted_at')
            ->leftJoin('users', 'users.id', 'properties.owner_id')
            ->select('properties.*', 'users.name as agent_name', 'users.image as agentImage', 'viewed_user_properties.created_at as viewed_user_properties_created_at', 'viewed_user_properties.id as viewed_user_property_id')->groupBy('viewed_user_properties.id');
      
        if (!empty($requestData['search_input_property'])) {
            $results = $userProperties->get();
        }
        else if (!empty($data['perPage'])) {
            $results = $userProperties->paginate($data['perPage']);

        } else {
            $results = $userProperties->get();
        }
        // dd($results);
        return $results;
    }
}
