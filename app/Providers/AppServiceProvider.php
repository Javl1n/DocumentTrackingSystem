<?php

namespace App\Providers;

use Blade;
use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

        Blade::if('bhw', function () {
            return auth()->user()->user_type === 'BHW';
        });

        Blade::if('cho', function () {
            return auth()->user()->user_type === 'CHO';
        });
    }
}