<?php

namespace UgoWarembourg\Compteurcycle;

use Illuminate\Support\ServiceProvider;

class CompteurcycleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'compteurcycle');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('UgoWarembourg\Compteurcycle\Controllers\CompteurcycleController');

    }
}
