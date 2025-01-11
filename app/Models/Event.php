<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_name',
        'event_description',
        'priority',
        'reminder ',
        'due_date',
        'start_from',
        'end_to',
        'is_active',
        'project_id',
        'action',
        'owner_id',
        'is_reminder_email',
        'is_copmpleted_email'

    ];

    public function fetchEvents($data, $requestData, $requiredData = [])
    {
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $eventsData = Event::query();
        //Commented code when projects table
        $eventsData->leftJoin('projects', function ($join) {
            $join->on('projects.id', '=', 'events.project_id')
                ->whereNotNull('events.project_id');
        });
        if (!empty($data['projectId'])) {
            $eventsData->where('events.project_id', $data['projectId']);
        }
        $eventsData->where(function ($query) use ($loggedInUserId) {
            $query->where('events.owner_id', $loggedInUserId)
                ->orWhereHas('associations', function ($query) use ($loggedInUserId) {
                    $query->where('association_id', $loggedInUserId);
                });
        });
        if (!empty($requestData['date'])) {
            $eventsData->whereDate('due_date', '=', $requestData['date']);
        } else {
            $eventsData->where(DB::raw("CONCAT(due_date, ' ', end_to)"), '>', now());
        }
        $eventsData->whereNull('events.deleted_at')
            ->leftJoin('users', 'users.id', 'events.owner_id')
            ->select('events.*', 'users.name as owner_name', 'users.image as ownerImage', 'projects.project_name', DB::raw('null as attachments'), DB::raw('null as user_associations'), DB::raw('null as selectedAgentProperties'), DB::raw('null as selectedConnectedCustomers'), DB::raw('null as selectedConnectedAgents'))->groupBy('events.id');

        if (!empty($data['perPage'])) {
            $results = $eventsData->paginate($data['perPage']);
        } else {
            $results = $eventsData->get();
        }

        if ($results->isNotEmpty() && !empty($requiredData)) {
            foreach ($results as $result) {
                if (in_array('attachments', $requiredData)) {
                }
                if (in_array('user_associations', $requiredData)) {
                    $result->user_associations = EventAssociation::where('event_associations.event_id', $result->id)->where('event_associations.type', '!=', 'property')->leftJoin('users', 'users.id', 'event_associations.association_id')->select('event_associations.*', 'users.name as association_name', 'users.image as association_image')->get();
                }
            }
        }
        return $results;
    }

    public function getEventDetails($eventId, $requiredData = [])
    {

        $result = Event::where('events.id', $eventId)->whereNull('events.deleted_at')
            ->leftJoin('users', 'users.id', 'events.owner_id')
            ->leftJoin('projects', function ($join) {
                $join->on('projects.id', '=', 'events.project_id')
                    ->whereNotNull('events.project_id');
            })
            ->select('events.*', 'users.name as owner_name', 'users.image as ownerImage', DB::raw('null as attachments'), DB::raw('null as user_associations'), 'projects.project_name')->first();
        if (!empty($result) && !empty($requiredData)) {
            if (in_array('attachments', $requiredData)) {
                $result->attachments = EventAttachment::where('event_attachments.event_id', $result->id)->get();
            }
            if (in_array('user_associations', $requiredData)) {
                // $result->user_associations = EventAssociation::where('event_associations.event_id',$result->id)->where('event_associations.type','!=','property')->leftJoin('users', 'users.id', 'event_associations.association_id')->select('event_associations.*','users.name as association_name','users.image as association_image')->get();
                $result->selectedAgentProperties = EventAssociation::where('event_associations.event_id', $result->id)->where('event_associations.type', '=', 'property')->pluck('association_id')->toArray();
                $result->selectedConnectedCustomers = EventAssociation::where('event_associations.event_id', $result->id)->where('event_associations.type', '=', 'customer')->pluck('association_id')->toArray();
                $result->selectedConnectedAgents = EventAssociation::where('event_associations.event_id', $result->id)->where('event_associations.type', '=', 'agent')->pluck('association_id')->toArray();
            }
        }
        return $result;
    }

    public function associations()
    {
        return $this->hasMany(EventAssociation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
