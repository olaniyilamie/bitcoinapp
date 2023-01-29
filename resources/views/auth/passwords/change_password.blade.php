<div class="row card" id="password_changed">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 px-0 text-center card-header profile_header">
                            CHANGE PASSWORD
                        </div>
                    </div>
    
                    <div class="row card-body p-1 profile_bg_color">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 d-none my-1 py-2" id="successMsg">
                                    <div class="alert alert-success fade show mb-1 py-1" role="alert">
                                        <p class="text-center my-0 py-0"></p>
                                    </div>
                                </div>
                            </div>
                            <form method="POST">                                
                                <div class="row mb-1">
                                    <label for="oldpassword" class="col-12 col-form-label small">Old Password</label>
                                    <div class="col-12">
                                        <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="old_password">
                                        <span class="text-danger error_text oldpassword_error" role="alert"></span>
                                    </div>
                                </div>
        
                                <div class="row mb-1">
                                    <label for="password" class="col-12 col-form-label">New Password</label>
        
                                    <div class="col-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                                        <span class="text-danger error_text password_error" role="alert"></span>                                
                                    </div>
                                </div>
        
                                <div class="row mb-1">
                                    <label for="password_confirmation" class="col-12 col-form-label small">Confirm Password</label>
        
                                    <div class="col-12">
                                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation">
                                        <span class="text-danger error_text password_error" role="alert"></span>
                                    </div>
                                </div>
        
                                <div class="row mt-4 justify-content-center ">
                                    <div class="col-3">
                                        <button type="button" class="btn sellnowBtn btn-block font-weight-bold py-2" id="resetPwd">
                                            UPDATE
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $('#resetPwd').click(function(){
                    $('.error_text').html('');
                    $('.form-control').removeClass('is-invalid');
                    let oldpassword=$('#oldpassword').val();
                    let password=$('#password').val();
                    let password_confirmation=$('#password_confirmation').val();
                     
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                        url:"{{route('change_password')}}",
                        type:'POST',
                        data:{'oldpassword': oldpassword, 'password': password, 'password_confirmation': password_confirmation},
                        
                        success:function(update){
                            $('span .error_text').text('');
                            $('#successMsg').addClass('d-none');
                            if(update.status==0){
                                $.each(update.error, function(prefix,val){
                                        $('span.'+prefix+'_error' ).text(val[0]);
                                        $('.error_text').addClass('small');
                                        $('span.'+prefix+'_error' ).siblings('.form-control').addClass('is-invalid');
                                })
                            }else if(update.status==1){
                                $('span.oldpassword_error').text('Password provided is wrong, kindly confirm your password and try again');
                                $('.error_text').addClass('small');
                                $('span.oldpassword_error').siblings('.form-control').addClass('is-invalid');
                            }else{
                                $('.error_text').html('');
                                $('.form-control').removeClass('is-invalid');
                                $('input[type=password]').val('');
                                $('#successMsg').removeClass('d-none');
                                $('#successMsg p').html('Your password has been updated successfully!')
                                $('#successMsg p').addClass('font-weight-bold')
                               
                           }
                        },
                        error:function(error){
                            $('#feedback').html(error);
                            console.log(error);
                        }
                    })
                })
                </script>