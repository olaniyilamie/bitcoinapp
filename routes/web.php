<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitcoinController;
use App\Http\Controllers\EthereumController;
use App\Http\Controllers\GiftcardController;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//App Route
Route::get('/login',[AppController::class,'login'])->name('login');
Route::get('/signup',[AppController::class,'signup'])->name('signup');
Route::post('/signup',[AppController::class,'store'])->name('register');

Route::get('/bitcoins',[BitcoinController::class,'index'])->name('show_bit');
Route::post('/sellbitcoins',[BitcoinController::class,'sellBitcoin'])->name('sellbtc');

// Ethereum Route
Route::get('/ethereum',[EthereumController::class,'index'])->name('show_eth');

//giftcard Route
Route::get('/giftcards',[GiftcardController::class,'index'])->name('show_giftcards');
Route::get('/giftcard_itunes',[GiftcardController::class,'giftcardItunes'])->name('itunes');