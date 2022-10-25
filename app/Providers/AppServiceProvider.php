<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\SocialMedia\Facebook;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         //this in method we registe our services,routes,middleware routes etc.

       


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       //this method we use to book the functionality.
    }
}
