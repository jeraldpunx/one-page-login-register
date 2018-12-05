<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Countries;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        view()->share('countries', Countries::getList('en', 'json'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
