<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiftcardController extends Controller
{
    //
    public function index(){
        return view('giftcard');
    }

    protected function itunesCardType(Request $req){
        /**List of the itunes card in the array
        USA iTunes card($100-$200 single) ₦387
        USA iTunes card($50 USA iTunes ($50 single) ₦387
        USA iTunes ($300-$2,000 single) ₦387
        USA iTunes(Others e.g $25, $75, $65, etc) ₦230
        CADiTunes ₦248
        AUD Itunes ₦295
        NZD iTunes ₦267
        USA iTunes Ecode(100-200) ₦368
        USA iTunes Ecode(50) ₦368
        EURO iTunes ₦379
        Uk iTunes ₦497
        CHF iTunes ₦511
        */
        $itunes_card=[
            0=>387,
            1=>387,
            2=>387,
            3=>230,
            4=>248,
            5=>295,
            6=>267,
            7=>368,
            8=>368,
            9=>379,
            10=>497,
            11=>511
        ];
        $key=$req['key'];
        $cardValue=$itunes_card[$key];
        return $cardValue;
    }

    public function giftcardItunes(){
        return view('giftcard_itunes');
    }

    public function giftcardApple(){
        return view('giftcard_apple');
    }

    protected function applePayType(Request $req){
        /** /**List of the apple pay card in the array
         * USA Apple[5-10mins Fast Load] ($300-$2000) ₦368
         * USA Apple[1-3hrs Slow Load] ($300-$2000) ₦368
        */
        $apple_pay=[
            0=>368,
            1=>368
        ];
        $key=$req['key'];
        $cardValue=$apple_pay[$key];
        return $cardValue;
    }


    // this function will return the view of other type of gift card like ebay,amex,macy and vanilla
    public function giftcardOther(){
        return view('giftcard_others');
    }

    protected function otherCardType(Request $req){
        /** /**List of ebay,amex,macy and vanilla card value are in the array
         * USA Ebay($200-500 Denomination) ₦357
         * USA Ebay($50 -100) Denomination) ₦340
         * American Express(Amex $100-$299 single) ₦390
         * American Express(Amex $300-$399 single) ₦430
         * American Express(Amex $400-$500 single) ₦460
         * Visa 4358 ($100-$300) ₦380
         * Visa 4358 ($400-$500) ₦400
         * Walmart($100-$300single) ₦330
         * Walmart($400-$500 single) ₦330
         * Vanilla($100-$199single) ₦339
         * Vanilla($200-$399single) ₦389
         * Vanilla($400-$500 single) ₦385
        */
        $others=[
            0=>357,
            1=>340,
            2=>390,
            3=>430,
            4=>460,
            5=>380,
            6=>400,
            7=>330,
            8=>330,
            9=>339,
            10=>389,
            11=>385
        ];

        $key=$req['key'];
        $cardValue=$others[$key];
        return $cardValue;
    }

    public function giftcardGoogleplay(){
        return view('giftcard_googleplay');
    }

    protected function googleplayCardType(Request $req){
        /** /**List of google play card value are in the array
         * USA Google (50-100) ₦400
         * USA Google ($150-200) ₦400
         * UUK Google ₦435
         * CAD Google ₦ 270
         * AUD Google ₦230
         * Euro Google ₦375
         * CHF Google ₦415
         * KRW Google ₦194
        */
        $googleplay=[
            0=>400,
            1=>400,
            2=>345,
            3=>435,
            4=>270,
            5=>230,
            6=>375,
            7=>415,
            8=>194,
        ];

        $key=$req['key'];
        $cardValue=$googleplay[$key];
        return $cardValue;
    }

    public function giftcardOther2(){
        return view('giftcard_others2');
    }

    protected function other2CardType(Request $req){
        /** /**List of google play card value are in the array
         * USA Sephora($100-$500 single) ₦379
         * USA Sephora($50-$99 single) ₦347
         * USA Nordstrom ($100-$500 single) ₦406
         * USA NordStrom($50 single) ₦347
         * Nike($100-$200) ₦0
         * Nike ($300 single & above)₦400
         * Nike ($50 single)₦0
         * Footlocker ₦395 ($100-$500) ₦364
         * Macy ₦339($100-$300)
         * Razer Gold ₦430 ($50-$200) ₦410
        */
        $other2=[
            0=>379,
            1=>347,
            2=>406,
            3=>347,
            4=>0,
            5=>400,
            6=>0,
            7=>364,
            8=>339,
            9=>430,
        ];

        $key=$req['key'];
        $cardValue=$other2[$key];
        return $cardValue;
    }

    public function giftcardSteam(){
        return view('giftcard_steam');
    }

    protected function steamCardType(Request $req){
        /** /**List of google play card value are in the array
         * USA Steam($20 single) ₦395
         * USA Steam($50 - $500 single) ₦395
         * UK Steam ₦525
         * CAD Steam ₦295
         * AUD Steam ₦265
         * NZD Steam ₦255
         * Euro Steam ₦435
         * Euro Steam Ecode ₦415
         * USA Steam Ecode ₦355
         * CHF Steam ₦415
        */
        $steam=[
            0=>395,
            1=>395,
            2=>525,
            3=>295,
            4=>265,
            5=>255,
            6=>435,
            7=>415,
            8=>355,
            9=>415,
        ];

        $key=$req['key'];
        $cardValue=$steam[$key];
        return $cardValue;
    }
}
