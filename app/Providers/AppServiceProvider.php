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

        /*
            This code is use to share data to the file,that is common on every page.
            note: partials.users is the path to you view file, where you want to share data.
        */
            // view()->composer('partials.users', function($view) {
            //     $view->with('users',User::get());
            // });
    }
}
