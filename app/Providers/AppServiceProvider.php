<?php

namespace App\Providers;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\User;
use Blade;
use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

        // Gate::define("our-file", function (User $user, $barangay) {
        //     return 
        // });

        Gate::define('bhw', function (User $user) {
            // if($user->user_type === 'BHW'){
            //     $worker = BarangayHealthWorker::where('user_id', $user->id)->first();
            //     return $worker->barangay_id === $barangay->id;
            // } else {
            //     return false;
            // }

            return $user->user_type === 'BHW';
        });
        Gate::define('cho', function (User $user) {
            return $user->user_type === 'CHO';
        });

        Blade::if('bhw', function () {
            return auth()->user()?->can('bhw');
        });

        Blade::if('cho', function () {
            return auth()->user()?->can('cho');
        });
    }
}
