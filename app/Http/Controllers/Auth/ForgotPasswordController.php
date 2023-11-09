<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;
use Hash;
use App\User;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function showForgetPasswordForm(Request $request){
        return view('auth.passwords.forgetPassword');
    }
    public function submitForgetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        var_dump($token);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // send mail

        // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject("Forget Password Email");
        // });

        return redirect()->back()->with('message','We have sent password reset link on your provided email!');
    }
    public function showResetPasswordForm($token){
        return view('auth.passwords.forgetpasswordlink',['token' => $token]);  
    }
    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6'
        ]);

        $update_password = DB::table('password_resets')->where('email',$request->email)->where('token',$request->token)->first();
        if(!$update_password){
            return back()->withInput()->with('error','Invalid token!');
        }

        $user = User::where('email',$request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where('email',$request->email)->delete();

        return redirect('/login')->with('message','Your password is reset successfully!');
    }


}
