<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        // if(!session()->has('url.intended'))
        // {
        //     session(['url.intended' => url()->previous()]);
        // }
        
        return view('auth.login');
    }

    public function login(Request $req){   
        $req->old('username');

        $input = $req->all();
        $this->validate($req, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($req->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))){
            return redirect()->url()->previous();
        }else{
            return redirect()->route('login')->with('error','These credentials do not match our records.');
        }

          

   }
}
