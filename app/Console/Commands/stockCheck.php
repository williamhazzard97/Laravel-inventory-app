<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;

class stockCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stockCheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks stock levels and returns warning of low stocks';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $low_items = Item::where('quantity', '<', '3')->get();
        echo $low_items;
    }
}
