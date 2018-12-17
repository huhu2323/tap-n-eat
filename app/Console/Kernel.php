<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Inventory;
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
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            $inventories = Inventory::where('cycle', 'daily');
            foreach ($inventories as $value) {
                $value->stock = $value->stock_per_cycle;
            }
        })->daily();

        $schedule->call(function () {
            $inventories = Inventory::where('cycle', 'weekly');
            foreach ($inventories as $value) {
                $value->stock = $value->stock_per_cycle;
            }
        })->weekly();

        $schedule->call(function () {
            $inventories = Inventory::where('cycle', 'monthly');
            foreach ($inventories as $value) {
                $value->stock = $value->stock_per_cycle;
            }
        })->monthly();

        $schedule->call(function () {
            $inventory = new Inventory;
            $inventory->product_id = 0;
            $inventory->stock = 0;
            $inventory->cycle = "manual";
            $inventory->stock_per_cycle = null;
            $inventory->save();
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
