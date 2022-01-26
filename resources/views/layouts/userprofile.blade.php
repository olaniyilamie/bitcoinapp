@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bolder btn btn-lg my-0" id="profile">
                    <i class="fas fa-user mr-1"></i> PROFILE
                </h4>
            </div>
            
            <div class="card-body">
                <p class="btn my-0 py-0 font-weight-bold" id="editProfile"><i class="fas fa-cog mr-1"></i> Edit Acount</p>
    
                <hr class="d-inline d-md-block p-2 p-md-0"> 
                <p class="btn my-0 py-0 font-weight-bold"><i class="fas fa-unlock mr-1"></i> Change Password</p> 
    
                <hr class="d-inline d-md-block p-2 p-md-0">  
                <p class="btn my-0 py-0 font-weight-bold"><i class="fas fa-bell mr-1"></i> Notification </p> 
    
                <hr class="d-inline d-md-block p-2 p-md-0"> 
                <p class="btn my-0 py-0 font-weight-bold"><i class="fas fa-eye-slash mr-1"></i> Privacy </p> 
    
                <hr class="d-inline d-md-block p-2 p-md-0">  
                <p class="btn my-0 py-0 font-weight-bold"><i class="fas fa-university mr-1"></i> Add Bank Details </p> 
    
                <hr class="d-inline d-md-block p-2 p-md-0"> 
                <p class="btn my-0 py-0 font-weight-bold"><i class="fas fa-sign-out-alt mr-1"></i> Logout </p> 
            </div>
        </div>
    </div>
    <div class="col-md-8" id="display">
        @yield('profile_section')
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
        })
    </script>
@endsection