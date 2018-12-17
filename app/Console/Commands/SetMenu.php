<?php

namespace App\Console\Commands;


use App\Product;
use App\Menu;
use Illuminate\Console\Command;

class SetMenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $week = strtolower(\Carbon\Carbon::today()->format('l'));
        $products = Product::all();
        foreach ($products as $value) {
            if ($value->menu->day == $week || $value->menu->day == 'everyday')
            {
                $value->menu->available = true;
                $value->menu->save();
            }
            else
            {
                $value->menu->available = false;
                $value->menu->save();
            }
        }
    }
}
