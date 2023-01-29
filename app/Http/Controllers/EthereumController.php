<?php

namespace App\Http\Controllers;
use App\Models\Bankdetail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EthereumController extends Controller
{
    //
    public function index(){
        $account = 0;
        if(Auth::check()){
            $account = 1;
            $id = Auth::id();
            $userAccount = Bankdetail::where('user_id',$id)->get();            
            return view('crypt_ethereum',compact('userAccount','account'));
        }
        return view('crypt_ethereum',compact('account'));
    }
}
