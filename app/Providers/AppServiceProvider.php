<?php

namespace App\Providers;

use App\Services\StravaServiceUrl;
use Illuminate\Support\Facades\Config;
use App\Services\StravaActivityService;
use Illuminate\Support\ServiceProvider;
use App\Services\StravaAuthenticationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(StravaServiceUrl::class)
            ->needs('$url')
            ->give(Config::get('strava.url'));

        $this->app->when(StravaAuthenticationService::class)
            ->needs(StravaServiceUrl::class)
            ->give(function ($app) {
                return $app
                    ->make(StravaServiceUrl::class)
                    ->setResource('/oauth/token');
            });

        $this->app->when(StravaActivityService::class)
            ->needs(StravaServiceUrl::class)
            ->give(function ($app) {
                return $app
                    ->make(StravaServiceUrl::class)
                    ->setResource('/activities');
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
