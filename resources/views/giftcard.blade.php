@extends('layouts.master')
@section('content')
    @if (session('successful'))
    <div class="alert alert-success alert-dismissible fade show mb-1 py-1" role="alert">
        <p class="text-center">{{ session('successful') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row px-4 mx-0 justify-content-around">
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('itunes')}}"><img src="{{url('itunes.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('itunes')}}"><small class="font-weight-bold text-muted giftlink">ITUNES</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('googleplay.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">GOOGLEPLAY</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('steam.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">STEAM</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('applepay.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">APPLE</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('sephora.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">SEPHORA</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('nordstrom.jpg')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">NORDSTROM</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('ebay.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">EBAY</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('walmart.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">WALMART</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('nike.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">NIKE</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('amex.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">AMEX</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('visa.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">VISA</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('footlocker.jpg')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">FOOT LOCKER</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('macy.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">MACY</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('razer.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">RAZER GOLD</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('vanilla.jfif')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">VANILLA</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('gamestop.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">GAMESTOP</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('target.jpg')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">TARGET</small>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a><img src="{{url('convert.png')}}" class="img-fluid py-3"></a>
                    <small class="font-weight-bold text-muted">AIRTIME 2 CASH</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-3">
        <div class="col-12">
            <p>Looking for where to convert your giftcards(Itunes, Steam, Walmart, Vanilla, 
                Best buy, Google play, Gamestop, etc.)  to cash(Naira or Bitcoins)? Look no more.
            </p>
            <p>
                Welcome to <b>DasCoins</b>, Nigeria’s No. 1 Gift Card Exchanger. DasCoins helps you convert your <a href="">Itunes</a> gift 
                card, <a href="">Steam cards</a>,<a href=""> Google Play</a>, <a href="">Amazon</a>, <a href="">etc</a>. gift cards to Naira or bitcoins. Our staffs 
                are always available 24/7 to attend to your orders. We accept legitimately purchased Usa, Uk, Austaralian 
                and Canadian itunes gift card, Steam cards, Googleplay, Best buy, Sephora gift cards, etc. in exchange for cash.
            </p>
            <p><span class="font-weight-bold">NOTE:</span> Only customers who send in unused gift cards are eligible for payment.</p>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            


        })
    </script>
@endsection