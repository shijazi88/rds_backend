<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\JobControl;
use App\Mail\BirthdayEmail;
use App\Jobs\SendBirthDateEmail;
use App\Jobs\ClassSessionGeneratorJob;
use App\Jobs\TestJob;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        // ...
        Commands\TruncateTables::class,
    ];

    
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        \Log::info("kernel.....");
        $jobs = JobControl::where('is_active', true)->get();
        // \Log::info( $jobs);
        foreach ($jobs as $job) {
            if (!empty($job->cron_expression)) {
                $schedule->job(new $job->job_class)->cron($job->cron_expression);
            } 
            else{
                \Log::error("empty cron");
                \Log::error($job);
            }
        }
        // $schedule->job(new ClassSessionGeneratorJob)->everyMinute();
        // \Log::info("ClassSessionGeneratorJob");
        // $schedule->job(new TestJob)->everyMinute();
        // send birth date email
        // $schedule->job(new SendBirthDateEmail)->dailyAt('00:00');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
