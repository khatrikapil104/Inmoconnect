<?php

namespace App\Console\Commands;

use App\Models\ProjectTask;
use Illuminate\Console\Command;

class ProjectTaskStatusCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project-task-status-cron-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project Task Status Upated';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info('Project task status cron job start');

        $projectTask = ProjectTask::where('status', 'active')
                                    ->where('end_date', '<', now())
                                    ->whereNull('deleted_at')
                                    ->get();
                                    
            if ($projectTask && $projectTask->isNotEmpty()) {
                foreach ($projectTask as $task) {
                    $task->status = 'pending';
                    $task->save();
                    \Log::info('Project task status updated successfully. project_task_id ='.$task->id.'projectId ='.$task->project_id.' Project Name = '.$task->task_name );
                }
            }

            \Log::info('Project task status cron job end');
    }
}
