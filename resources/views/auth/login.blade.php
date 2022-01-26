@extends('layouts.master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center font-weight-bolder"> DASCOIN <img src="{{url('logo.png')}}" class="img-fluid"> </h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row border-dark mb-5">
                            <div class="col-12 pb-2">
                                <label class="text-right small font-weight-bold my-0" for="username">Email or Username</label>
                                <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror @if(session('error')) is-invalid @endif" value="{{ old('username') }}" required autocomplete="email" autofocus placeholder="Enter your email address or username">        
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                @if (session('error'))
                                    <div class="col-12 py-0 my-0">
                                        <small class="my-0 py-1 text-danger font-weight-bold">{{ session('error') }}</small>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label class="text-right small font-weight-bold my-0" for="email-address">Password</label>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link float-right py-0 small" href="{{ route('password.request') }}">
                                        <small>{{ __('Forgot Your Password?') }}</small>
                                    </a>
                                @endif
                            </div>
                            <div class="col-12 input-group pb-2">
                                <input id="password" type="password" name="password" class="form-control rounded @error('password') is-invalid @enderror @if (session('error')) is-invalid @endif" required autocomplete="current-password" placeholder="Enter your passcode">
                                <span class="input-group-text" id="changeIcon"><i class="fas fa-eye btn btn-sm" id="showpwd"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                    <label class="form-check-label small" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold">
                                    LOGIN
                                </button>
                                <small> New to DasCoin ?</small><a href="{{route('register')}}" class="float-right small">Create Account</a>
                            </div>
                            <div class="col-12 text-center">
                                <small class="font-weight-bold text-muted">--- OR ---</small>
                            </div>
                            <div class="col-12 text-center">
                                <a href=""><span class="px-3 giftlink font-weight-bold">Facebook</span></i></a> 
                                <a href=""><span class="px-3 giftlink font-weight-bold">Google</span></a>
                            </div>
                        </div>
                    </form>
                </div>
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
                let pwdMode=$("#password").attr('type');
                if(pwdMode !== 'text'){
                    $("#password").attr('type','text');
                    $("#changeIcon").html('<i class="fas fa-eye-slash btn btn-sm" id="showpwd"></i>')
                }else{
                    $("#password").attr('type','password');
                    $("#changeIcon").html('<i class="fas fa-eye btn btn-sm" id="showpwd"></i>')   
                }
            })
    
        })
    </script>
@endsection
