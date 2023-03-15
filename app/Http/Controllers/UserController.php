<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\SocialMedia\Facebook;
use Facebook;


// for facades
// use App\SocialMedia\Facades\Facebook as FacadeFacebook;
use FB as FacadeFacebook;
class UserController extends Controller
{
    public function index(\App\SocialMedia\Facebook $fb){
    	// as an indepency injection usage
    	// now we can access all method and variable
    	
    	$fb->setFaceBookCred(config('services.facebook'));
    	dd($fb->getSecretKey());


    	
    }
    public function getUserWithServiceProvider(Facebook $fb){
        // dd($fb);
        // Now we are not using service providers
        // $fb->setFaceBookCred(config('services.facebook'));
        dd($fb->getSecretKey());
    }
    public function getUsers(Facebook $fb){

    	// dd($fb->redirect_url);
    	dd($fb->getClientID());
    }
    // Using Facade
    public function getDataUsingFacade(){
        dd(FacadeFacebook::getSecretKey());
    } 
}
