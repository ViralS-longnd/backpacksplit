<?php

namespace LongND\BackpackSplit;

use LongND\BackpackSplit\Console\Commands\CrudBackpackCommand;
use LongND\BackpackSplit\Console\Commands\CrudControllerSplitBackpackCommand;
use LongND\BackpackSplit\Console\Commands\CrudControllerModalBackpackCommand;
use Illuminate\Support\ServiceProvider;

class BackpackSplitServiceProvider extends ServiceProvider
{
    protected $commands = [
        CrudControllerSplitBackpackCommand::class,
        CrudControllerModalBackpackCommand::class,
        CrudBackpackCommand::class,
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
                // AUTO PUBLISH
        // if (\App::environment('local')) {
        //     if ($this->shouldAutoPublishPublic()) {
        //         \Artisan::call('vendor:publish', [
        //             '--provider' => 'LongND\BackpackSplit\BackpackSplitProvider',
        //             '--tag' => 'public',
        //         ]);
        //     }
        // }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/backpacksplit.php', 'backpacksplit.php');
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
        $this->publishes([
            __DIR__.'/config/backpacksplit.php' => config_path('backpacksplit.php'),
        ], 'backpacksplit.config');

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
