<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('queue:work --stop-when-empty')
        //      ->everyMinute()
        //      ->withoutOverlapping();
        $schedule->command('queue:work')
            ->everyFiveMinutes()
            ->withoutOverlapping();
        $schedule->command('project-status-cron-job')->daily();
        $schedule->command('project-task-status-cron-job')->daily();
        $schedule->command('event-reminder-user-cron-job')->everyMinute();
        $schedule->command('event-completed-user-cron-job')->everyMinute();
        $schedule->command('xml-feed-cron-job')->everyThreeHours();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
