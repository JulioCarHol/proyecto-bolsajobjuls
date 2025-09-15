<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Auth\PlainTextUserProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the custom user provider
        Auth::provider('plaintext', function ($app, array $config) {
            return new PlainTextUserProvider($app['hash'], $config['model']);
        });
    }
}
