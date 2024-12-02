<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\URL;

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
        if((bool) env('APP_FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        };
        Gate::define('viewPulse', function (User $user) {

            return true; // all users can view

            // return in_array($user->email, [
            //     'user@example.com',
            // ]);
        });
    }
}
