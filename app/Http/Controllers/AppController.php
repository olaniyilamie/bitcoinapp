<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class AppController extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function signup(){
        return view('signup');
    }

    public function store(Request $req){
        $username = $req->old('username');
        $phone_number = $req->old('phone_number');
        $email = $req->old('email');
        $password = md5($req['password']);
        

        $validated = $req->validate([
            'username' => 'required|unique:users|min:4|max:10',
            'phone_number' => 'required|unique:users,phone_number',
            'email' => 'unique:users,email|email:rfc,dns',
            'password' => 'required|confirmed|min:6|alpha_num',
        ]);
        
        $user = new User();
        $user->username = $req['username'];
        $user->phone_number = $req['phone_number'];
        $user->email = $req['email'];
        $user->password='bit'.$password.'coins';
        $success=$user->save();

        if($success){
            return redirect('/login')->with('success',ucfirst($req['username']).', your account has been created successfully !');
        }else{
            return redirect()->back()->with('erroe','Not successful, Try Again !'); 
        }


        

    }
}
