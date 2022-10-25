<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\SocialMedia\Facebook;
use Facebook;
class UserController extends Controller
{
    public function index(\App\SocialMedia\Facebook $fb){
    	// as an indepency injection usage
    	// now we can access all method and variable
    	
    	$fb->setFaceBookCred(config('services.facebook'));
    	dd($fb->getSecretKey());


    	// Now we are not using service providers
    	// $fd = new Facebook();
    	// $fb->setFaceBookCred(config('services.facebook'));
    	// dd($fb);
    }
    public function getUsers(Facebook $fb){

    	// dd($fb->redirect_url);
    	dd($fb->getClientID());
    } 
}
