<?php

namespace App\Http\Controllers;
use App\Models\Bankdetail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BitcoinController extends Controller
{
    //
    public function index(){
        $account = 0;
        if(Auth::check()){
            $account = 1;
            $id = Auth::id();
            $userAccount = Bankdetail::where('user_id',$id)->get();            
            return view('crypt_bitcoins',compact('userAccount','account'));
        }
        return view('crypt_bitcoins',compact('account'));
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

        
        $apiKey = env('PAXFUL_API_KEY');
        $apiSecret = env('PAXFUL_SECRET_KEY');
        $queryParams = [
            'merchant' => env('PAXFUL_MERCHANT_ID'),
            'apikey' => $apiKey,
            'nonce' => time(),
            'to' => env('PAXFUL_WALLET_ADDRESS'), // replace!
            'track_id' => 'dascoin'.sha1(time()),
            'amount' => $bitcoinQty
        ];
        $apiSeal = hash_hmac('sha256', http_build_query($queryParams), $apiSecret);
        $queryParamsWithApiSeal = array_merge($queryParams, ['apiseal' => $apiSeal]);
        $signedQueryString = http_build_query($queryParamsWithApiSeal);
        return redirect("https://paxful.com/wallet/pay?$signedQueryString");
    }
}
