<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::AFTER_REG;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'f_name' => ['required', 'string', 'max:20', 'min:3'],
            'l_name' => ['required', 'string', 'max:20', 'min:3'],
            'username' => ['required', 'string', 'unique:users,username', 'max:12'],
            'phone_number' => ['required', 'unique:users,phone_number', 'max:25'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'l_name' => $data['l_name'],
            'f_name' => $data['f_name'],
            'username' => $data['username'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
