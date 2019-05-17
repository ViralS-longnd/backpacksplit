<?php

namespace LongND\BackpackSplit;

use LongND\BackpackSplit\Console\Commands\CrudBackpackCommand;
use LongND\BackpackSplit\Console\Commands\ViewBackpackCommand;
use LongND\BackpackSplit\Console\Commands\ModelBackpackCommand;
use LongND\BackpackSplit\Console\Commands\ConfigBackpackCommand;
use LongND\BackpackSplit\Console\Commands\RequestBackpackCommand;
use LongND\BackpackSplit\Console\Commands\CrudModelBackpackCommand;
use LongND\BackpackSplit\Console\Commands\CrudRequestBackpackCommand;
use LongND\BackpackSplit\Console\Commands\CrudControllerBackpackCommand;
use Illuminate\Support\ServiceProvider;

class BackpackSplitServiceProvider extends ServiceProvider
{
    protected $commands = [
        ConfigBackpackCommand::class,
        CrudModelBackpackCommand::class,
        CrudControllerBackpackCommand::class,
        CrudRequestBackpackCommand::class,
        CrudBackpackCommand::class,
        ModelBackpackCommand::class,
        RequestBackpackCommand::class,
        ViewBackpackCommand::class,
    ];
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'longnd');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'longnd');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);

        // Register the service the package provides.
        $this->app->singleton('backpacksplit', function ($app) {
            return new BackpackSplit;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['backpacksplit'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        // $this->publishes([
        //     __DIR__.'/../config/backpacksplit.php' => config_path('backpacksplit.php'),
        // ], 'backpacksplit.config');

        // Publishing the views.
        $this->publishes([__DIR__.'/resources/views' => base_path('resources/views')], 'views');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/longnd'),
        ], 'backpacksplit.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/longnd'),
        ], 'backpacksplit.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}