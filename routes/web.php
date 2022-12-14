<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Cache;
 
// Route::get('/cache', function () {
//     return Cache::get('key');
// });
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// ================Service containers
// this service container not global so we can not access it from any where in project for that we will use this in service provider.Service provider where we use our service containers so we can access it where we want with http requests.


// method 1

App::bind('App\SocialMedia\Facebook',function($app){
	// dd($app);

	// return new App\SocialMedia\Facebook(config('services.facebook'));
// 	//ye object return hoga constructor method mein

});


// $fb = App::make('App\SocialMedia\Facebook');
// dd($fb);

// $facebook = App::make('App\SocialMedia\Facebook');
// dd($facebook);
// dd($facebook->getClientID());

// Method 2
// Now we are getting service container from service provider;
// $fb = App::make('App\SocialMedia\Facebook');
// dd($fb);


// get servcie container in UserController

Route::get('/users','UserController@index');
Route::get('/allusers','UserController@getUsers');








// ============================================================

Route::get('/', function () {

	// laravel facades

	// using direcr path path
	// $fb = new App\SocialMedia\Facebook(config('services.facebook'));
	// using service provider
	// $fb = App::make('App\SocialMedia\Facebook');
	// return $fb->getClientID();
	// using facades
	// return FB::getClientID();

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// forget password
Route::get('forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post'); 
Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');
// reset password
Route::get('/reset-password', 'Auth\ResetPasswordController@reset_password')->name('reset-password');
Route::put('/update-password', 'Auth\ResetPasswordController@update_password')->name('update-password');

// Mail Notification
/*
This is simple mail sending logic implemented with jobQueue
*/
Route::get('/send-notification','NotificationController@sendNotification')->name('send.notification');

Route::get('/run_job', function () {

    \Artisan::call('queue:work');

    dd("job started");

});
// Mial Notification
/*
This is  mail sending logic implemented with jobQueue.
Also send addition data aprameter from controller to nofication class to send dynamic email to user.
*/
Route::get('/send-mail-notification', 'NotificationController@sendMailNotification');

//Send email using markdown mailable class.
/* implementiong the event and listener work on it..than send email throught listener and also implement shouldQueue for sending email in listener*/
Route::get('/new-user','NotificationController@newUserRegisterMail');


//Job
/* send email using job and dispatch the job from controller */

Route::get('/create-job','NotificationController@jobBatching');

// job Chaining
/* send job after on and other mean when one job finit than second one will be start*/

Route::get('/group-chain-job','NotificationController@chainJobs');

Route::get('/group-betch-job','NotificationController@batchJobs');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// laravel url
use Illuminate\Support\Facades\URL;
Route::get('/urls',function(){
	echo url()->current();
	echo "<br>";
 
// Get the current URL including the query string...
echo url()->full();
echo "<br>";
 
// Get the full URL for the previous request...
echo url()->previous();
echo "<br>";

echo URL::current();

});

// laravel logs

Route::get('/log',function(){
Log::alert('Alert: Keep your credentials secure!');
});




//======================Socialite laravel

//github Login

Route::get('/login/github', 'Auth\LoginController@redirectToProvider');
Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallback');

// Facebook login

Route::get('/login/facebook', 'Auth\FacebookController@facebookRedirect');
Route::get('/auth/facebook/callback', 'Auth\FacebookController@loginWithFacebook');


// ===================Livewire

Route::view('/livewire/register', 'auth.livewire-register');


// -===================toast alert message

Route::get('/alert', 'AlertMessageController@index');
Route::get('/notify', 'AlertMessageController@notify');


//=====================Many to Many relations

Route::get('/projects','RelationsController@index');
Route::get('/managers','RelationsController@managers');
Route::get('/managers_with_pivot','RelationsController@managersPivot');


//=====================Collection methods

Route::get('/collection/method/map-with-slug','CollectionController@mapWithSlugs');
Route::get('/collection/method/map-with-keys','CollectionController@mapWithKeys');
Route::get('/collection/method/push_method','CollectionController@pushMethod');
Route::get('/collection/method/filter_method','CollectionController@filterMethod');
Route::get('/collection/method/pluck_method','CollectionController@pluckMethod');
Route::get('/collection/method/contain_method','CollectionController@containMethod');
Route::get('/collection/method/partition_method','CollectionController@partitionMethod');
Route::get('/collection/method/each_method','CollectionController@eachMethod2');

// use \App\Http\Livewire\tuts\UserDetails;
//===================Livewire

Route::get('/livewire/user_details', \App\Http\Livewire\Tuts\UserDetails::class);
Route::get('/livewire/actions', \App\Http\Livewire\Tuts\ConnectButton::class);
Route::get('/livewire/contact_form', \App\Http\Livewire\Tuts\ContactForm::class);

Route::group(['prefix'=>'livewire', 'as' => 'tags.'], function(){
	Route::get('/tags',\App\Http\Livewire\Tuts\Crud\Index::class)->name('index'); 
	// so route name will be like so tags.index
});
