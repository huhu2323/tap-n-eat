<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Inventory;

class SetStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:set';

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
        $inventory = Inventory::all();
        foreach ($inventory as $value) {
            $value->stock = $value->stock_per_cycle;
            $value->save();
        }
    }
}
