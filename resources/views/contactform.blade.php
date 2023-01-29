@extends('layouts.master')
@section('content')
    <div class="row formpage_height">
        <div class="col-12  formpage_color rounded rounded-5">
            @if(Session::has('success'))
                    <div class="row justify-content-center">
                        <div class="col-6 px-0 my-1 pt-5">
                            <div class="alert alert-success fade show mb-1 py-1" role="alert">
                                @foreach ($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                                <p class="text-center my-2">{{Session::get('success')}} <i class="fa-solid fa-circle-check pl-3"></i></p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="row justify-content-center">
                        <div class="col-6 px-0 d-none my-1 pt-5">
                            <div class="alert alert-success fade show mb-1 py-1" role="alert">
                                <p class="text-center my-2">{{Session::get('error')}} <i class="fa-solid fa-circle-xmark pl-3"></i></p>
                            </div>
                        </div>
                    </div>
                    @endif
            <div class="row justify-content-center">
                <div class="col-11 form_bgcolor my-5 pb-5">                    
                    <div class="row">
                        <div class="col-12 text-center px-3  pt-5 text-white">
                            <h4>Get In Touch</h4>
                            <p class="small">Fill the contact form and we will get in touch with you in less than 48 hours. Kindly make your message less vague and details enough to make help us resolve your request quickly.</p>
                        </div>
                    </div>
                    <div class="row  px-3 mt-2 ">
                        <div class="col-12">
                            <div class="row p-1 bg-white rounded rounded-5">
                                <div class="col-12 col-md-3 col-sm-5 pt-4 rounded rounded-2 text-white" style="background-color: rgb(31, 35, 66)">
                                    <p class="small text-center font-weight-bold">CONTACT INFORMATION</p>
                                    <p class="small text-center"> you can reach out to us 24/7 on any of the contact platform</p>
                                    <div class="row">
                                        <div class="col-12 py-md-3 py-1">
                                            <div class="row py-2  flex-nowrap">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-12 pr-0">
                                                            <p class="small m-0"> +2348012345678</p>
                                                            <p class="small m-0"> +2348012345678</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 py-md-3 py-1">
                                            <div class="row py-2 flex-nowrap">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-envelope pr-2"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-12 pr-0">
                                                            <p class="small d-inline"> support@dascoin.com</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 py-md-3 py-1">
                                            <div class="row py-2 flex-nowrap">
                                                <div class="col-2">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-12 pr-0">
                                                            <p class="small d-inline"> Lagos, Nigeria</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9 col-sm-7 pt-3">
                                    <form method="POST" id="updateForm" action="{{route('send_contact_form')}}">
                                        @csrf
                                            <div class="row mb-1">
                                                <div class="col-12">
                                                    <label for="fullname" class="small text-muted mb-0 font">your fullname</label>
                                                    <input id="fullname" name="fullname" type="text" class="form-control input_with_line @if($errors->has('fullname')) is-invalid @endif" placeholder="Olaniyi Olamide" value="@if(old('fullname')) {{ old('fullname') }} @endif"  autocomplete="fullname">        
                                                    @if($errors->has('fullname'))
                                                        <span class="text-danger small" role="alert">{{ $errors->first('fullname') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-12">
                                                    <label for="email"  class="small text-muted mb-0">your email</label>
                                                    <input id="email" name="email" type="text" class="form-control input_with_line @if($errors->has('email')) is-invalid @endif" placeholder="olamide@gmail.com"  value="@if(old('email')) {{ old('email') }} @endif"  autocomplete="email"> 
                                                    @if($errors->has('email'))
                                                        <span class="text-danger small" role="alert">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                        
                                            <div class="row mb-1">
                                                <div class="col-12 pt-2">
                                                    <label for="subject"  class="small text-muted mb-0">your subject</label>
                                                    <input id="subject" name="subject" type="text" class="form-control input_with_line @if($errors->has('subject')) is-invalid @endif" placeholder="Sell Bitcoin" value="@if(old('subject'))  {{ old('subject') }}  @endif"   autocomplete="subject">        
                                                    @if($errors->has('subject'))
                                                        <span class="text-danger small" role="alert">{{ $errors->first('subject') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-12 pt-2">
                                                    <label for="message"  class="small mb-0 font-weight-bold" style="color:rgb(31, 35, 66)">Message</label>
                                                    <textarea  id="message" name="message" class="form-control input_with_line @if($errors->has('message')) is-invalid @endif"  style="border-bottom: 2px solid rgb(31, 35, 66);" rows="4">
                                            
                                                    </textarea>
                                                    @if($errors->has('message'))
                                                        <span class="text-danger small" role="alert">{{ $errors->first('message') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 my-2">
                                                    <button class="btn btn-sm sellnowBtn py-1 text-white" id="editBtn">
                                                        Send Message
                                                    </button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
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
                
            })
        </script>
    </div>
@endsection
