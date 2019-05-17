<?php

namespace LongND\BackpackSplit\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class CrudBackpackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backpack:split:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a CRUD interface: Controller, Model, Request';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = ucfirst($this->argument('name'));

        // Create the CRUD Controller and show output
        Artisan::call('backpack:split:crud-controller', ['name' => $name]);
        echo Artisan::output();

        // Create the CRUD Model and show output
        Artisan::call('backpack:split:crud-model', ['name' => $name]);
        echo Artisan::output();

        // Create the CRUD Request and show output
        Artisan::call('backpack:split:crud-request', ['name' => $name]);
        echo Artisan::output();
    }
}
