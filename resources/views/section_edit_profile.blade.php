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
                            <input id="lname" name="lname" type="text" class="form-control" @error('lname') is-invalid @enderror required placeholder="Last Name" autocomplete="lname" autofocus @if(old('lname')) value="{{ old('lname') }}" @else value="{{ucfirst($user->l_name)}}" @endif>        
                            <span class="text-danger error_text lname_error" role="alert"></span>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <label class="small font-weight-bold" for="fname">First Name</label>
                            <input id="fname" name="fname" type="text" class="form-control " required placeholder="First Name" autocomplete="fname" autofocus  @if(old('fname')) value="{{ old('fname') }}" @else value="{{ ucfirst($user->f_name)}}" @endif>        
                           <span class="text-danger error_text fname_error" role="alert"></span>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-12 pt-2">
                            <label class="small font-weight-bold" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" @if(old('email')) value="{{ old('email') }}" @else value="{{ $user->email}}" @endif required autocomplete="email">        
                            <span class="text-danger error_text email_error" role="alert"></span>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-12 pt-2">
                            <label class="small font-weight-bold" for="phonenumber">PhoneNumber</label>
                            <input id="phonenumber" name="phonenumber" type="text" class="form-control" required placeholder="Country code e.g +2347045554345" @if(old('phonenumber')) value="{{ old('phonenumber') }}" @else value="{{ $user->phone_number}}" @endif autocomplete="phonenumber">        
                            <span class="text-danger error_text phonenumber_error" role="alert"></span>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-12 pt-2">
                            <label class="small font-weight-bold" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required placeholder="Username" @if(old('username')) value="{{ old('username') }}" @else value="{{ $user->username}}" @endif autocomplete="username">        
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

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
            url:"{{route('update_profile')}}",
            type:'POST',
            dataType:'json',
            success:function(update){
                $('span .error_text').text('');
               if(update.status==0){
                $.each(update.error, function(prefix,val){
                       $('span.'+prefix+'_error' ).text(val[0]);
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
