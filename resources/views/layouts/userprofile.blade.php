@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header" style="background-color: #F7F7F7">
                <h4 class="card-title font-weight-bolder btn btn-lg my-0" id="profile">
                    <i class="fas fa-user mr-1"></i> PROFILE
                </h4>
            </div>
            
            <div class="card-body">
                <p class="btn my-0 py-0 font-weight-bold" id="editProfile"><i class="fas fa-cog mr-1"></i> Edit Acount</p>
    
                <hr class="my-2"> 
                <p class="btn my-0 py-0 font-weight-bold" id="changePwd"><i class="fas fa-unlock mr-1"></i> Change Password</p> 
    
                <hr class="my-2">  
                <p class="btn my-0 py-0 font-weight-bold"  id="notification"><i class="fas fa-bell mr-1"></i> Notification </p> 
    
                <hr class="my-2"> 
                <p class="btn my-0 py-0 font-weight-bold"  id="privacy"><i class="fas fa-eye-slash mr-1"></i> Privacy </p> 
    
                <hr class="my-2">  
                <p class="btn my-0 py-0 font-weight-bold" id="bankDetail"><i class="fas fa-university mr-1"></i> Add Bank Details </p> 
    
                <hr class="my-2"> 
                    <p class="btn my-0 py-0 font-weight-bold" data-toggle="modal" data-target="#logout">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form> 
            </div>
        </div>
    </div>
    <div class="col-md-8  detail_col8" id="display">
        @yield('profile_section')
    </div>
    {{-- Logout modal --}}
    <div class="modal row" tabindex="-1" role="dialog" id="logout">
        <div class="modal-dialog" role="document">
            <div class="modal-content profile_bg_color">
                <div class="modal-body text-center font-weight-bold">
                    <p>Are you sure you want to logout ?</p>
                </div>
                <div class="row  text-right pb-2">
                    <div class="col-12">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary px-4">Exit</button>     
                        <a class="dropdown-item px-2 d-inline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <button class="btn btn-danger">Logout</button>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
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
            $("#profile").click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                    url:"{{route('ajax_user_profile')}}",
                    type:'POST',
                    dataType:'text',
                    success:function(profile_detail){
                       $('#display').html(profile_detail)
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });

            $('#editProfile').click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                    url:"{{route('edit_profile')}}",
                    type:'POST',
                    dataType:'text',
                    success:function(edit_profile){
                       $('#display').html(edit_profile)
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            })

            $('#changePwd').click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                    url:"{{route('password_setting')}}",
                    type:'POST',
                    dataType:'text',
                    success:function(change_password){
                       $('#display').html(change_password)
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            })

            $('#bankDetail').click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                    url:"{{route('user_bank_details')}}",
                    type:'POST',
                    dataType:'text',
                    success:function(bank_detail){
                       $('#display').html(bank_detail)
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            })

            $('#notification').click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                    url:"{{route('notification')}}",
                    type:'POST',
                    dataType:'text',
                    success:function(notification){
                       $('#display').html(notification)
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            })

            $('#privacy').click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                    url:"{{route('privacy')}}",
                    type:'POST',
                    dataType:'text',
                    success:function(privacy){
                       $('#display').html(privacy)
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            })

        })
    </script>
@endsection