    <div class="row card">
        <div class="col-12 ">
            <div class="row">
                <div class="col-12 px-0 text-center card-header profile_header">
                    EDIT PROFILE
                </div>
            </div>                    
            <div class="row card_body profile_bg_color p-1">
                <div class="col-12">
                    @foreach($user as $user)
                        <form method="POST" id="updateForm" >
                        @csrf
                            <div class="row justify-content-center">
                                <div class="col-6 px-0 d-none my-1 py-2" id="successMsg">
                                    <div class="alert alert-success fade show mb-1 py-1" role="alert">
                                        <p class="text-center my-0 py-0"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12">
                                    <label for="lname">Last Name</label>
                                    <input id="lname" name="lname" type="text" class="form-control" placeholder="Last Name" value="@if(old('lname')) {{ old('lname') }} @else {{ucfirst($user->l_name)}} @endif" required autocomplete="lname">        
                                    <span class="text-danger error_text lname_error" role="alert"></span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12">
                                    <label for="fname">First Name</label>
                                    <input id="fname" name="fname" type="text" class="form-control" placeholder="First Name"  value="@if(old('fname')) {{ old('fname') }} @else {{ ucfirst($user->f_name)}} @endif" required autocomplete="fname"> 
                                   <span class="text-danger error_text fname_error" role="alert"></span>
                                </div>
                            </div>
        
                            <div class="row mb-1">
                                <div class="col-12 pt-2">
                                    <label for="phonenumber">PhoneNumber</label>
                                    <input id="phonenumber" name="phonenumber" type="text" class="form-control" placeholder="Country code e.g +2347045554345" value="@if(old('phonenumber'))  {{ old('phonenumber') }} @else {{ $user->phone_number}} @endif"  required autocomplete="phonenumber">        
                                    <span class="text-danger error_text phonenumber_error" role="alert"></span>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-3 my-2">
                                    <button type="button" class="btn btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold" id="editBtn">
                                        UPDATE
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#editBtn').click(function(e){
            let lname=$('#lname').val();
            let fname=$('#fname').val();
            let phonenumber=$('#phonenumber').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                url:"{{route('update_profile')}}",
                type:'POST',
                dataType:'json',
                data:{'lname': lname,'fname': fname,'phonenumber': phonenumber},
                // statusCode: {
                //     419: function() {
                //         alert( "page not found" );
                //         window.location = "{{route('login')}}";
                //     }
                // },
                success:function(update){
                    $('span .error_text').text('');
                    $('#successMsg').addClass('d-none');
                    if(update.status==0){
                        $.each(update.error, function(prefix,val){
                                $('span.'+prefix+'_error' ).text(val[0]);
                                $('.error_text').addClass('small');
                                $('span.'+prefix+'_error' ).siblings('.form-control').addClass('is-invalid');
                        })
                    }else{
                    $('.error_text').html('');
                    $('.form-control').removeClass('is-invalid');
                    $('#successMsg').removeClass('d-none');
                    $('#successMsg p').html(update.msg)
                    $('#successMsg p').addClass('font-weight-bold')
                    
                }

                },
                error:function(error){
                    console.log(error);
                }
            })
        })
    </script>
