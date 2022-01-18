<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitcoinController extends Controller
{
    //
    public function index(){
        return view('crypt_bitcoins');
    }

    public function sellBitcoin(Request $req){
        
        $bitcoin = $req->old('bitcoin');    
        $sendfrom = $req->old('sendfrom');
        $bitcoinQty = $req->old('bitcoinQty');                
        $toReceive = $req->old('toReceive');
        $sendQty = $req->old('sendQty');                   

        $req->validate([
            'bitcoin' => 'required',
            'sendfrom' => 'required',
            'bitcoinQty' => 'required|gt:10|lt:9999',
            'toReceive' => 'required',
        ]);

        
        $apiKey = 'po3Utcn9jJi5JYVNYAT8ZyQ09rXp46xC'; // specify
        $apiSecret = 'lobkZLhTyPYVJ9QE4oxmEhQ6l3zQctUH'; // specify
        $queryParams = [
            'merchant' => 'wBLYgx1DkR9', // replace
            'apikey' => $apiKey,
            'nonce' => time(),
            'to' => '386UpLvX7mpBTT8YD2xwCGQdHh6pnb85VX', // replace!
            'track_id' => 'dascoin'.sha1(time()),
            'amount' => $bitcoinQty
        ];
        $apiSeal = hash_hmac('sha256', http_build_query($queryParams), $apiSecret);
        $queryParamsWithApiSeal = array_merge($queryParams, ['apiseal' => $apiSeal]);
        $signedQueryString = http_build_query($queryParamsWithApiSeal);
        return redirect("https://paxful.com/wallet/pay?$signedQueryString");
    }
}
