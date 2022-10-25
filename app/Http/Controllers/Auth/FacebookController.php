<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Validator;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Auth;
class FacebookController extends Controller
{
	  use AuthenticatesUsers;
    public function facebookRedirect()
    {

        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
    	
        try {
    
            $user = Socialite::driver('facebook')->user();
            
            $isUser = User::where('fb_id', $user->id)->first();
     
            if($isUser){
                Auth::login($isUser);
                return redirect('/home');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('password')
                ]);
    
                Auth::login($createUser);
                return redirect('/home');
            }
    
        } catch (Exception $exception) {

            dd($exception->getMessage());
        }
    }
}
