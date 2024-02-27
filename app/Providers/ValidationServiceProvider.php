<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Validator::extend('unique_slug', function ($attribute, $value, $parameters, $validator) {
            // Check uniqueness of the slug in the 'header_category' table
            return !\DB::table('header_category')->where('slug', $value)->exists();
        });
    }
}
