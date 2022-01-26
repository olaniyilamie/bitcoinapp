@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="font-weight-bolder my-0 text-center rounded"> DASCOIN <img src="{{url('logo.png')}}" class="img-fluid"> </h3>
                </div>

                <div class="card-body mb-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-1">
                            <div class="col-12">
                                <label class="small font-weight-bold" for="f_name">Name</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input id="f_name" name="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" required placeholder="First Name" autocomplete="f_name" autofocus value="{{ old('f_name') }}">        
                                        @error('f_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input id="l_name" name="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" required placeholder="Last Name" autocomplete="l_name" autofocus value="{{ old('l_name') }}">        
                                        @error('l_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-12 pt-2">
                                <label class="small font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email">        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-12 pt-2">
                                <label class="small font-weight-bold" for="phone_number">PhoneNumber</label>
                                <input id="phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" required placeholder="Country code e.g +2347045554345" value="{{ old('phone_number') }}" autocomplete="phone_number">        
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-12 pt-2">
                                <label class="small font-weight-bold" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" required placeholder="Username" value="{{ old('username') }}" autocomplete="username">        
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-12 pt-2">
                                <label class="text-right my-0 small font-weight-bold" for="password">Password</label>
                            </div>
                            <div class="col-12">
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 pt-2">
                                <input type="password"  id="password-confirm" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" required placeholder="Confirm Password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold">
                                    SIGN UP
                                </button>
                                <small> Already have an account?</small>
                                <a href="{{ route('login') }}" class="float-right small">Login</a>
                            </div>
                        </div>
                        <div class="row">
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
@endsection
