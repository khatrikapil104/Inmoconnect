<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class ProjectStatusCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project-status-cron-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project Status Upated';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info('Project status cron job start');
        $projects = Project::where('status', 'in_progress')
            ->where('end_date', '<', now())
            ->whereNull('deleted_at')
            ->get();

        if ($projects && $projects->isNotEmpty()) {
            foreach ($projects as $project) {
                $project->status = 'overdue';
                $project->save();
                
                \Log::info('Project status updated successfully. projectId ='.$project->id.' Project Name = '.$project->project_name );

            }
        }

        \Log::info('Project status cron job end');
    }
}
