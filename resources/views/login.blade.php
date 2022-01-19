@extends('layouts.master')
@section('content')
    @if (session('successful'))
    <div class="alert alert-success alert-dismissible fade show mb-1 py-1" role="alert">
        <p class="text-center">{{ session('successful') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row d-flex justify-content-around my-5">
        <div class="col-md-5">
            <div class="row">
                <div class="col-12 p-0">
                    <p class="font-weight-bold py-2 text-center rounded"> DASCOIN <img src="{{url('logo.png')}}" class="img-fluid"> </p>
                </div>
                <div class="col-12 py-2">
                    <label class="text-right small font-weight-bold" for="email-address">Email or Username</label>
                    <input id="username" type="text" class="form-control rounded" required placeholder="Enter your email address or username">        
                </div>
                <div class="col-12 py-0 my-0">
                    <label class="text-right my-0 small font-weight-bold" for="email-address">Password</label>
                </div>
                <div class="col-12 py-2 input-group">
                    <input id="pwd" type="password" class="form-control rounded" required placeholder="Enter your passcode">
                    <span class="input-group-text" id="changeIcon"><i class="fas fa-eye btn btn-sm" id="showpwd"></i></span>
                </div>
                <div class="col-12 mb-2">
                    <button class="btn btn-dim btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold">LOGIN</button>
                    <small> New to DasCoin ?</small><a class="float-right small">Create Account</a>
                </div>
                <div class="col-12 text-center">
                    <small class="font-weight-bold text-muted">--- OR ---</small>
                </div>
                <div class="col-12 text-center">
                    <a href=""><span class="px-3 giftlink font-weight-bold">Facebook</span></i></a> 
                    <a href=""><span class="px-3 giftlink font-weight-bold">Google</span></a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#showpwd").click(function(){
                let pwdMode=$("#pwd").attr('type');
                if(pwdMode !== 'text'){
                    $("#pwd").attr('type','text');
                    $("#changeIcon").html('<i class="fas fa-eye-slash btn btn-sm" id="showpwd"></i>')
                }else{
                    $("#pwd").attr('type','password');
                    $("#changeIcon").html('<i class="fas fa-eye btn btn-sm" id="showpwd"></i>')   
                }
            })
    
        })
    </script>
    @endsection