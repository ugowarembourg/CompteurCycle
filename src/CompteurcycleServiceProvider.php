<?php

namespace UgoWarembourg\Compteurcycle;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class CompteurcycleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/asset/js' => public_path('/js/ugowarembourg/compteurcycle'),
        ], 'larahome-package');
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
        Event::listen('App\Events\MSMessageEvent', '\UgoWarembourg\Compteurcycle\EventListener\CompteurCycleEventListener');

    }
}
