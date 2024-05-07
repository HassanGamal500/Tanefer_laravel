<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('generate:voucher')->daily();
        $schedule->command('get:lowestFare')->dailyAt('02:00');
        //$schedule->command('get:airports')->daily();
        //$schedule->command('cancel:flightBooking')->everyFifteenMinutes();
        $schedule->command('telescope:prune --hours=168')->daily();
        //$schedule->command('save:tbo-cities')->monthly();
        $schedule->command('create_update:gta_hotel')->cron('0 12 */15 * *')->appendOutputTo('create_update_gta_hotel.log');//->cron('0 12 */15 * *');
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
