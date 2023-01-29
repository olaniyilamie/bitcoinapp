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
                    <a href="{{route('itune')}}"><img src="{{url('itunes.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('itune')}}"><small class="font-weight-bold d-block text-muted giftlink">ITUNES</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('googleplay')}}"><img src="{{url('googleplay.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('googleplay')}}"><small class="font-weight-bold text-muted d-block">GOOGLEPLAY</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('steam')}}"><img src="{{url('steam.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('steam')}}"><small class="font-weight-bold text-muted d-block">STEAM</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('apple')}}"><img src="{{url('applepay.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('apple')}}"><small class="font-weight-bold text-muted giftlink d-block">APPLE</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other2')}}"><img src="{{url('sephora.png')}}" class="img-fluid py-3"></a>
                    <a href={{route('other2')}}""><small class="font-weight-bold text-muted d-block giftlink">SEPHORA</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other2')}}"><img src="{{url('nordstrom.jpg')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other2')}}"><small class="font-weight-bold text-muted d-block giftlink">NORDSTROM</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other')}}"><img src="{{url('ebay.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other')}}"><small class="font-weight-bold text-muted d-block giftlink">EBAY</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other')}}"><img src="{{url('walmart.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other')}}"><small class="font-weight-bold text-muted d-block giftlink">WALMART</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other2')}}"><img src="{{url('nike.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other2')}}"><small class="font-weight-bold text-muted d-block giftlink">NIKE</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other')}}"><img src="{{url('amex.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other')}}"><small class="font-weight-bold text-muted d-block giftlink">AMEX</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other')}}"><img src="{{url('visa.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other')}}"><small class="font-weight-bold text-muted d-block giftlink">VISA</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other2')}}"><img src="{{url('footlocker.jpg')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other2')}}"><small class="font-weight-bold text-muted d-block giftlink">FOOT LOCKER</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other')}}"><img src="{{url('macy.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other')}}"><small class="font-weight-bold text-muted d-block giftlink">MACY</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other2')}}"><img src="{{url('razer.png')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other2')}}"><small class="font-weight-bold text-muted d-block giftlink">RAZER GOLD</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('other')}}"><img src="{{url('vanilla.jfif')}}" class="img-fluid py-3"></a>
                    <a href="{{route('other')}}"><small class="font-weight-bold text-muted d-block giftlink">VANILLA</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href=""><img src="{{url('gamestop.png')}}" class="img-fluid py-3"></a>
                    <a href=""><small class="font-weight-bold text-muted d-block giftlink">GAMESTOP</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href=""><img src="{{url('target.jpg')}}" class="img-fluid py-3"></a>
                    <a href=""><small class="font-weight-bold text-muted d-block giftlink">TARGET</small></a>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="row">
                <div class="col-12 text-center">
                    <a href=""><img src="{{url('convert.png')}}" class="img-fluid py-3"></a>
                    <a href=""><small class="font-weight-bold text-muted d-block giftlink">AIRTIME 2 CASH</small></a>
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
                Welcome to <b>DasCoins</b>, Nigeria’s No. 1 Gift Card Exchanger. DasCoins helps you convert your <a href="{{route('itune')}}">Itunes</a> gift 
                card, <a href="{{route('steam')}}">Steam cards</a>,<a href="{{route('googleplay')}}"> Google Play</a>, <a href="">Amazon</a>, <a href="">etc</a>. gift cards to Naira or bitcoins. Our staffs 
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