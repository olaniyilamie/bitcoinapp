    <div class="row">
        <div class="col-12 card">
                @foreach($user as $user)
                <form method="POST" id="updateForm" >
                    @csrf
                    <div class="row mb-1">
                        <div class="col-12">
                            <h5 class="text-center text-primary font-weight-bolder">EDIT PROFILE</h5>
                        </div>
                        <div class="col-12 d-none" id="successMsg">
                            <div class="alert alert-success alert-dismissible fade show mb-1 py-1" role="alert">
                                <p class="text-center"></p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <label class="small font-weight-bold" for="lname">Last Name</label>
                            <input id="lname" name="lname" type="text" class="form-control" placeholder="Last Name" value="@if(old('lname')) {{ old('lname') }} @else {{ucfirst($user->l_name)}} @endif" required autofocus autocomplete="lname">        
                            <span class="text-danger error_text lname_error" role="alert"></span>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <label class="small font-weight-bold" for="fname">First Name</label>
                            <input id="fname" name="fname" type="text" class="form-control" placeholder="First Name"  value="@if(old('fname')) {{ old('fname') }} @else {{ ucfirst($user->f_name)}} @endif" required autofocus autocomplete="fname"> 
                           <span class="text-danger error_text fname_error" role="alert"></span>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-12 pt-2">
                            <label class="small font-weight-bold" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="@if(old('email')) {{ old('email') }} @else {{ $user->email}} @endif" required autocomplete="email">        
                            <span class="text-danger error_text email_error" role="alert"></span>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-12 pt-2">
                            <label class="small font-weight-bold" for="phonenumber">PhoneNumber</label>
                            <input id="phonenumber" name="phonenumber" type="text" class="form-control" placeholder="Country code e.g +2347045554345" value="@if(old('phonenumber'))  {{ old('phonenumber') }} @else {{ $user->phone_number}} @endif"  required autocomplete="phonenumber">        
                            <span class="text-danger error_text phonenumber_error" role="alert"></span>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-12 pt-2">
                            <label class="small font-weight-bold" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="@if(old('username')) {{ old('username') }} @else {{ $user->username}} @endif"  required autocomplete="username">        
                                <span class="text-danger error_text username_error" ></span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 my-2">
                            <button type="button" class="btn btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold" id="editBtn">
                                UPDATE
                            </button>
                        </div>
                    </div>
                </form>
                @endforeach
        </div>
    </div>
    <script type="text/javascript">
    $('#editBtn').click(function(e){
         let lname=$('#lname').val();
         let fname=$('#fname').val();
         let email=$('#email').val();
         let phonenumber=$('#phonenumber').val();
         let username=$('#username').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
            url:"{{route('update_profile')}}",
            type:'POST',
            dataType:'json',
            data:{'lname': lname,'fname': fname,'email': email,'phonenumber': phonenumber,'username': username},
            success:function(update){
                $('span .error_text').text('');
               if(update.status==0){
                $.each(update.error, function(prefix,val){
                        $('span.'+prefix+'_error' ).text(val[0]);
                        $('.error_text').addClass('small');
                        $('span.'+prefix+'_error' ).siblings('.form-control').addClass('is-invalid');
                   })
               }else{
                   $('#editProfile').click();
                   $('#successMsg').removeClass('d-none');
                   $('#successMsg p').html(update.msg)
               }

            },
            error:function(error){
                console.log(error);
            }
        })
    })
    </script>
