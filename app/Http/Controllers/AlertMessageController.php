<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertMessageController extends Controller
{
    public function index(){
    	// \Session::flash('status','Message info');
    	// return view('alert_message')->with('status','Data added Successfully');
    	// \Session::flash('error','Data Deleted');
		// return view('alert_message')->with('error','Data Deleted');
    	\Session::flash('warning','Are you sure you want to delete? ');
		return view('alert_message');
		// \Session::flash('info','This is xyz information');
		// return view('alert_message')->with('info','This is xyz information');
    }

    public function notify(){


    	// source url
    	// https://codelapan.com/post/toast-notification-in-laravel-8-with-laravel-notify-package
    	// https://websolutionstuff.com/post/laravel-8-toastr-notifications-example
    	
    	// notify()->success('Hi , welcome to codelapan');
    	notify()->success('Welcome to Laravel Notify ⚡️', 'My custom title');
    	// connectify('success', 'Connection Found', 'Success Message Here');
    	// drakify('success'); // for success alert 
    	// drakify('error'); // for error alert 
    	// smilify('success', 'You are successfully reconnected');

    	return view('notify');
    }
}
