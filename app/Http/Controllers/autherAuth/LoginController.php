<?php

namespace App\Http\Controllers\autherAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Auther;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Auther_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('auther'); // Replace 'admin' with your custom guard name
    }
    public function showLoginForm()
    {
        return view('auther.auth.login');
    }

    public function logidn(Request $request){
        if($request->has('guard')){
            $guard = $request->guard;
        }else{
            $guard = null;
        }
        $this->validateCredentials($request);
        $user = Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password]);
        if($user){
            return redirect($this->redirectTo);
        }else{
             return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Invalid email or password']);
            // return back()->with('message','Login failed..!');
        }
    }
    public function validateCredentials($request){
        $messages = [
            // 'email.required' => 'The email field is required.',
            // 'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'The provided email does not exist in our records.',
            // 'password.required' => 'The password field is required.',
        ];
        $request->validate([
            'email' => 'required|string|email|exists:authers,email',
            'password' => 'required|string'
        ],$messages);
    }
    
    
}
