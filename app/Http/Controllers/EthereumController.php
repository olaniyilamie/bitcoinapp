<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EthereumController extends Controller
{
    //
    public function index(){
        return view('crypt_ethereum');
    }
}
