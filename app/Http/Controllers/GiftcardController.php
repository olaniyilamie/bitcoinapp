<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiftcardController extends Controller
{
    //
    public function index(){
        return view('giftcard');
    }

    public function giftcardItunes(){
        return view('giftcard_itunes');
    }
}
