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
        // membari variabel $superAdmin ke navbar-super
        View::composer('template.navbar-super', function ($view) {
            $superAdmin = User::where('role_id', 1)->first();
            $view->with('superAdmin', $superAdmin);
        });
    }
}
