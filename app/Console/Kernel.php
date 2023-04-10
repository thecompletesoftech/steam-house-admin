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

     protected $commands = [
        // \App\Console\Commands\Livedata::class,
];



    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call('App\Http\Controllers\Api\V1\Customer\AuthController@login')->cron('*');

        $schedule->command('livedata:livedata')
             ->everyMinutes();

             $schedule->call(function () {
                $id = 1;
                  $input = [
                'livedata'=>$livedata,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

                $updatedata=DB::table('livedata')->where('id',$id)->update($input);

            })->everyMinute();



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
