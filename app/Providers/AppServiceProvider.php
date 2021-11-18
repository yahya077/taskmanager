<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\User;
use App\Observers\ProjectObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Project::observe(ProjectObserver::class);
    }
}
