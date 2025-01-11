<?php

namespace App\Console\Commands;

use App\Mail\EventReminder;
use App\Mail\EventReminderUser;
use App\Models\Event;
use App\Models\Project;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use DB, Redirect, Response, Auth, File, Mail;

class EventReminderUserCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event-reminder-user-cron-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder email to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info('Event riminder cron job start');
        $now = Carbon::now();
        $data = Event::with('associations')->whereNotNull('reminder')->get();

        $reminderData = [];
        $customerData = [];
        $properties = [];

        \Log::info($now);
        \Log::info(date('Y-m-d H:i:s'));
        foreach ($data as  $value) {
            $time = $now->copy()->addMinutes($value->reminder);
            $timeReminder = $time->format('H:i:s');
            $reminderData = Event::with('associations.user')
                ->where('start_from', '<=', $timeReminder)
                ->where('is_reminder_email', 0)
                ->whereDate('due_date', $now->toDateString())
                ->get();

            $projectName = '';
            $ownerName = '';
            
            if (($reminderData->isNotEmpty())) {

                foreach ($reminderData as $reminder) {
                    $ownerName = User::find($reminder->owner_id)->name;

                    if (!empty($reminder->associations) && isset($reminder->associations)) {
                        foreach ($reminder->associations as $val) {
                            if ($val->type == 'customer' || $val->type == 'agent' || $val->type == 'owner') {
                                $customerData[] = User::with('role')->find($val->association_id);
                            }
                            if ($val->type == 'property') {
                                $properties[] = Property::find($val->association_id);
                            }
                        }
                    }

                    if (!empty($reminder->project_id)) {
                        $projectName = Project::find($reminder->project_id)->project_name;
                    }
                    if (!empty($reminder->associations) && isset($reminder->associations)) {
                        foreach ($reminder->associations as $associationData) {

                            if ($associationData->type == 'customer' || $associationData->type == 'agent' || $associationData->type == 'owner' ) {
                                Mail::to($associationData->user->email)->send(new EventReminderUser($associationData->user->name, $reminder->due_date, $reminder->start_from, $reminder->end_to, $reminder->event_name, $reminder->reminder, $projectName, $customerData, $properties, $ownerName));

                                \Log::info('reminder mailed for event_id = ' . $reminder->id . ' event name = ' . $reminder->event_name . ' due_date = ' . $reminder->due_date . ' start_from = ' . $reminder->start_from . ' end_to' . $reminder->end_to);

                                Event::find($reminder->id)->update(['is_reminder_email' => 1]);
                            }
                        }
                    }
                }
                \Log::info('Event riminder cron job end');
            }
        }
    }
}
