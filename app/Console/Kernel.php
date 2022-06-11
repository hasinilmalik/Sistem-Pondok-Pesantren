<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
    * Define the application's command schedule.
    *
    * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
    * @return void
    */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('backup:clean')
        // ->dailyAt('09:10')
        // ->runInBackground();
        
        // $schedule->command('backup:run', ['--only-db'])
        // ->dailyAt('09:11')
        // ->runInBackground();
        $schedule->command('backup:clean')->dailyAt('02:50');
        $schedule->command('backup:run --only-db')->dailyAt('10:07');
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
