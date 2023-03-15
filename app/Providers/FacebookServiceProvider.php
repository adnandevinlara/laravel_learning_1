<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\SocialMedia\Facebook;
use Facebook;
class FacebookServiceProvider extends ServiceProvider
{

    protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //  this in method we registe our services,routes,middleware routes etc.
        // method 1
        // \App::bind('App\SocialMedia\Facebook',function($app){
        // \App::bind('Facebook',function($app){
            // dd($app);
           // return new \App\SocialMedia\Facebook(config('services.facebook'));
            //ye object return hoga constructor method mein

        // });

        // method 2 (Not work)

        // $facebook = App::make('App\SocialMedia\Facebook');
        // dd($facebook);
        // dd($facebook->getClientID());

        //method 4

        // $this->app->bind(Facebook::class, function(){
        //     return new \App\SocialMedia\Facebook(config('services.facebook'));
        // });

        // method 3
        // for facades
        $this->app->bind('fb',function(){
            return new Facebook(config('services.facebook'));
        });


        // method 4

        /*

        $this->app is a global variable.


        */

        $this->app->bind('Facebook', function ($app) {
            return new Facebook(config('services.facebook'));
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
