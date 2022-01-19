@extends('layouts.master')
@section('content')
    @if (session('successful'))
    <div class="alert alert-success alert-dismissible fade show mb-1 py-1" role="alert">
        <p class="text-center">{{ session('successful') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{ Form::open(array('url' => route('register'), 'method' => 'POST' )) }}
    <div class="row d-flex justify-content-around mb-3">
        <div class="col-md-5 card">
            <div class="row border-dark my-5">
                <div class="col-12 p-0 mt-0">
                    <p class="font-weight-bold py-2 text-center rounded"> DASCOIN <img src="{{url('logo.png')}}" class="img-fluid"> </p>
                </div>
                <div class="col-12 pt-2">
                    <label class="text-right small font-weight-bold" for="phone_number">PhoneNumber</label>
                    <input id="phone_number" name="phone_number" type="text" class="form-control rounded" required placeholder="Phone number with country code e.g +2347045554345" value="{{ old('phone_number') }}">        
                </div>
                @error('phone_number')
                <div class="col-12 py-0 my-0">
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror
                 
                <div class="col-12 pt-2">
                    <label class="text-right small font-weight-bold" for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control rounded" required placeholder="Username" value="{{ old('username') }}">        
                </div>
                @error('username')
                <div class="col-12 py-0 my-0">
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror

                <div class="col-12 pt-2">
                    <label class="text-right small font-weight-bold" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control rounded" placeholder="Email" value="{{ old('email') }}">        
                </div>
                @error('email')
                <div class="col-12 py-0 my-0">
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror

                <div class="col-12 pt-2">
                    <label class="text-right my-0 small font-weight-bold" for="password">Password</label>
                </div>
                <div class="col-12 pt-2">
                    <input type="password" id="password" name="password" class="form-control rounded" required placeholder="Password">
                </div> 
                @error('password')
                <div class="col-12 py-0 my-0">
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror
                
                <div class="col-12 pt-2">
                    <input type="password"  id="password" name="password_confirmation" class="form-control rounded" required placeholder="Confirm Password">
                </div>
                @error('password')
                <div class="col-12 py-0 my-0">
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror

                <div class="col-12 my-2">
                    <button class="btn btn-dim btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold">SIGN UP</button>
                    <small> Already have an account?</small><a href="" data-toggle="modal" data-target="#login" class="float-right small">Login</a>
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
    {{ Form::close() }}

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