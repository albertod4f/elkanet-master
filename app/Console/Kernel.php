<?php

namespace App\Console;

use App\clients;
use App\tagihan;
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
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {
            $clients = clients::where('status_client', 1)->get();

            foreach ($clients as $key => $client) {
                $tagihan = new tagihan();
                $tagihan->client_id = $client->id;
                $tagihan->periode = date('y-m-d');
                $tagihan->balance = $client->bayar;
                $tagihan->amount = $client->bayar;
                $tagihan->payment = 0;
                $tagihan->save();
            }
        })->everyFiveMinutes();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
