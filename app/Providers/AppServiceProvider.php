<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('view-admin', function (User $user)//This has a failsafe, it doesn't work unless //user is logged in. U can make something nullable by using ?User $user
        {
            return $user->isAdmin() ? Response::allow() : Response::deny('Oi! Frick OFF!');

        });
    }
}
