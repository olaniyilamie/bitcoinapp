<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitcoinController;
use App\Http\Controllers\EthereumController;
use App\Http\Controllers\GiftcardController;
use App\Http\Controllers\ProfileController;

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
Route::get('/profile',[ProfileController::class,'userProfile'])->name('user_profile');
Route::post('/profile',[ProfileController::class,'ajaxRefreshProfile'])->name('ajax_user_profile');
Route::post('/profile/edit',[ProfileController::class,'editProfile'])->name('edit_profile');
Route::post('/profile/update',[ProfileController::class,'updateProfile'])->name('update_profile');
Route::get('/bitcoins',[BitcoinController::class,'index'])->name('show_bit');
Route::post('/sellbitcoins',[BitcoinController::class,'sellBitcoin'])->name('sellbtc');

// Ethereum Route
Route::get('/ethereum',[EthereumController::class,'index'])->name('show_eth');

//giftcard Route
Route::get('/giftcards',[GiftcardController::class,'index'])->name('show_giftcards');
Route::get('/sell-giftcard_itunes',[GiftcardController::class,'giftcardItunes'])->name('itune');
Route::get('/sell-giftcard_apple',[GiftcardController::class,'giftcardApple'])->name('apple');
Route::get('/sell-giftcard_others(ebay-amex-macy-vanilla-walmart)',[GiftcardController::class,'giftcardOther'])->name('other');
Route::get('/sell-giftcard_googleplay',[GiftcardController::class,'giftcardGoogleplay'])->name('googleplay');
Route::get('/sell-giftcard_others(sephora-nordstrom-nike-razer)',[GiftcardController::class,'giftcardOther2'])->name('other2');
Route::get('/sell-giftcard_steam',[GiftcardController::class,'giftcardSteam'])->name('steam');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ajax route
// returns the list of itunes gift card prices
Route::post('/giftcard_itunes',[GiftcardController::class,'itunesCardType'])->name('get_itune_price');
Route::post('/giftcard_apple',[GiftcardController::class,'applePayType'])->name('get_apple_price');
Route::post('/sell-giftcard_others(ebay-amex-macy-vanilla-walmart)',[GiftcardController::class,'otherCardType'])->name('get_other_price');
Route::post('/giftcard_googleplay',[GiftcardController::class,'googlePlayCardType'])->name('get_googleplay_price');
Route::post('/giftcard_others(sephora-nordstrom-nike-razer)',[GiftcardController::class,'Other2CardType'])->name('get_other2_price');
Route::post('/giftcard_steam',[GiftcardController::class,'steamCardType'])->name('get_steam_price');
