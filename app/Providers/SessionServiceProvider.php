<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //providers'
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Session::macro('addAlert', function ($type, $message, $duration = 5000) {
            $alerts = Session::get('alerts', []);
            $alerts[] = ['type' => $type, 'duration' => $duration, 'message' => $message];
            Session::put('alerts', $alerts);
        });

        Session::macro('hasAlerts', function () {
            return Session::has('alerts');
        });

        Session::macro('getAlerts', function () {
            $alerts = Session::get('alerts');
            Session::forget('alerts');
            return $alerts;
        });
    }
}
