<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

use App\Http\Controllers\order;

class retrievedatajson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:retrieve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve Json Data Output As Excel';

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
        $pathStorage = Storage::disk('order_data')->getDriver()->getAdapter()->getPathPrefix();

        $path = $pathStorage . "/orders-20190602.json"; 

        $collection = collect(json_decode(file_get_contents($path), true));

       return (new order())->addNewOrder($collection);

    
    }
}
