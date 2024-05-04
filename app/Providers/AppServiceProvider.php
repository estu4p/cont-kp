<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use SimpleSoftwareIO\QrCode\QrCodeServiceProvider;

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
        // membari variabel $superAdmin ke navbar superAdmin
        View::composer('layouts.superadmin', function ($view) {
            $superAdmin = auth()->user();
            $view->with('superAdmin', $superAdmin);
        });

        // memberi variabel $user ke navbar adminUniv
        View::composer('layouts.admin', function ($view) {
            $user = auth()->user();
            $view->with('user', $user);
        });
    }
}
