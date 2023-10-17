<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Auth as FirebaseAuth;

class FirebaseAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Auth::extend('firebase', function ($app, $name, array $config) {
            return new FirebaseGuard(
                Auth::createUserProvider($config['provider']),
                $this->app->make(FirebaseAuth::class)
            );
        });
    }
}
