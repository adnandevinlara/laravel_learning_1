<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use DB;
use Hash;
use App\User;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(){
        $this->middleware('auth');
    }

    public function reset_password(){
        return view('auth.passwords.reset-password');
    }
    public function update_password(Request $request){
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'password' => ['required','string','min:6'],
            'password_confirmation' => ['same:password']
        ]);

        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/home')->with(['status'=>'Password reset successfully!']);
    }
}
