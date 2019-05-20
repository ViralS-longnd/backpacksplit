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
    protected $signature = 'backpack:crud {name} {--option=}';

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
        if ($this->option('option') == 'split') {
            Artisan::call('backpack:split:crud-controller', ['name' => $name]);
            echo Artisan::output();
        } elseif ($this->option('option') == 'modal') {
            Artisan::call('backpack:modal:crud-controller', ['name' => $name]);
            echo Artisan::output();
        } else {
            Artisan::call('backpack:crud-controller', ['name' => $name]);
            echo Artisan::output();
        }


        // Create the CRUD Model and show output
        Artisan::call('backpack:crud-model', ['name' => $name]);
        echo Artisan::output();

        // Create the CRUD Request and show output
        Artisan::call('backpack:crud-request', ['name' => $name]);
        echo Artisan::output();
    }
}
