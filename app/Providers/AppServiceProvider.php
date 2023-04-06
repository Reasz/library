<?php

namespace App\Providers;

use App\Models\User;
use Blade;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        Gate::define('admin', function( User $user)
        {
            return $user->type == '2' || $user->type == '1';
        });

        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });

        Gate::define('superadmin', function( User $user)
        {
            return $user->type == '1';
        });

        Blade::if('superadmin', function() {
            return request()->user()?->can('superadmin');
        });
    }
}
