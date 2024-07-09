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

        /** Add toasts to the session */
        Session::macro('addToasts', function ($type, $message, $title = null, $duration = 5000) {
            $toasts = Session::get('toasts', []);
            $toasts[] = ['type' => $type, 'duration' => $duration, 'message' => $message, 'title' => $title];
            Session::put('toasts', $toasts);
        });

        Session::macro('hasToasts', function () {
            return Session::has('toasts');
        });

        Session::macro('getToasts', function () {
            $toasts = Session::get('toasts');
            Session::forget('toasts');
            return $toasts;
        });
    }
}
