<?php

namespace App\Providers;

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
        Model::unguard(); // Allows mass assignment
        Model::shouldBeStrict(); // Basiclly makes eloquent more strict and stops you from accidently doing something weird
        Model::automaticallyEagerLoadRelationships(); // Loads relationships to increase performance
    }
}
