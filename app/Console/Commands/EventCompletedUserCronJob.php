<?php

namespace App\Console\Commands;

use App\Mail\EventCompletedUser;
use App\Mail\EventReminder;
use App\Mail\EventReminderUser;
use App\Models\Event;
use App\Models\Project;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use DB, Redirect, Response, Auth, File, Mail;

class EventCompletedUserCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event-completed-user-cron-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Event completed email to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info('Event completed cron job start');
        $now = Carbon::now();

        $customerData = [];
        $properties = [];


        $time = $now->format('H:i:s');

        $eventCompletedData = Event::with('associations.user')
            ->where('end_to', '<=', $time)
            ->where('is_copmpleted_email', 0)
            ->whereDate('due_date', $now->toDateString())
            ->get();

        $projectName = '';
        $ownerName = '';

        if (($eventCompletedData->isNotEmpty())) {

            foreach ($eventCompletedData as $completd) {
                if (!empty($completd->associations) && isset($completd->associations)) {
                    foreach ($completd->associations as $val) {
                        if ($val->type == 'property') {
                            $properties[] = Property::find($val->association_id);
                        }
                        if ($val->type == 'customer' || $val->type == 'agent') {
                            $associationId[] = $val->association_id;
                        }
                    }
                }
                if(!empty($associationId)){
                    $customerData = User::with('role')->whereIn('id', $associationId)->get();
                }
                $ownerName = User::find($completd->owner_id)->name;
                if (!empty($completd->project_id)) {
                    $projectName = Project::find($completd->project_id)->project_name;
                }
                if (!empty($completd->associations) && isset($completd->associations)) {
                    foreach ($completd->associations as $associationData) {
                        if ($associationData->type == 'customer' || $associationData->type == 'agent') {
                                Mail::to($associationData->user->email)->send(new EventCompletedUser($associationData->user->name, $completd->due_date, $completd->start_from, $completd->end_to, $completd->event_name, '', $projectName, $customerData, $properties, $ownerName));

                                \Log::info('completed mailed for event_id = ' . $completd->id . ' event name = ' . $completd->event_name . ' due_date = ' . $completd->due_date . ' start_from = ' . $completd->start_from . ' end_to' . $completd->end_to);
                                Event::find($completd->id)->update(['is_copmpleted_email' => 1]);
                            }
                    }

                    \Log::info('Event completed cron job emailed');
                }
            }
        }
        \Log::info('Event completed cron job end');
    }
}
