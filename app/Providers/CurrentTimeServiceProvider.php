<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class CurrentTimeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('currentTime', 'App\Services\CurrentTime');
    }
}
