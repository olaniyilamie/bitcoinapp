<div id="accountDetail">
    <div class="row">
        <div class="col-12 card table-responsive">
            <div class="row">
                <div class="col-12 text-center card-header profile_header px-0">
                    ACCOUNT DETAILS <button class="btn btn-outline-light btn-sm float-right mr-2" @if($return !== 0)id="showBankForm"@endif>New Bank Account </button>
                </div>
            </div>
            
            <div class="row profile_bg_color" id="alert_message">
                <div class="col-12 d-none my-1 py-2" id="successMsg">
                    <div class="fade show mb-1 py-1" role="alert">
                        <p class="alert text-center my-0 py-2"></p>
                    </div>
                </div>
            </div>
            <form id="addAccountDetail" class=" @if($return !== 0)d-none @endif">
                <div class="row py-1 px-0 profile_bg_color">                    
                @if($return == 0)
                <div class="col-12 my-1 py-2">
                        <p class="alert alert-secondary font-weight-bold text-center my-0 py-2"> ADD YOUR ACCOUNT DETAIL</p>                
                </div>
                @endif
                    <div class="col-12">
                        <div class="row mb-1">
                            <div class="col-12 form-group">
                                <label for="bankname">Bank Name</label>
                                <select class="form-control" id="bankname" name="bankname" required autocomplete="bankname">
                                    @if(old('bankname'))
                                        <option value="{{old('bankname')}}">{{old('bankname')}}</option>
                                    @else
                                        <option value="">Select a bank</option>
                                        @foreach ($banks as $bank)
                                        <option value="{{$bank->bank_name}}">{{$bank->bank_name}}</option>
                                        @endforeach
                                    @endif
                                </select>       
                                <span class="text-danger error_text bankname_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-12">
                                <label for="accname">Account Name</label>
                                <input id="accname" name="accname" type="text" class="form-control"  value="@if(old('accname')) {{ old('accname') }} @endif" required autocomplete="accname"> 
                                <span class="text-danger error_text accname_error" role="alert"></span>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-12 pt-2">
                                <label for="accnumber">Account Number</label>
                                <input id="accnumber" name="accnumber" type="text" class="form-control" value="@if(old('accnumber'))  {{ old('accnumber') }} @endif"  required autocomplete="accnumber">        
                                <span class="text-danger error_text accnumber_error" role="alert"></span>
                            </div>
                        </div>
                        <div class="row mb-2 justify-content-center">
                            <div class="col-6 mt-2">
                                <button type="button" class="btn btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold" id="saveBtn">
                                    SUBMIT
                                </button>
                            </div>
                            <div class="col-12 mb-1">
                                <small class="text-danger font-weight-bold pt-3">NOTE: Any payment made to a wrong account as a result of your mistake would not be rectify</small>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @if($return !== 0)
            <div class="row">
                <div class="col-12 px-0">
                    <table class="table table-bordered profile_bg_color mb-0" id="account_record">
                        <thead>
                            <tr>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userAccount as $userAccounts)
                            <tr>
                                <td id="bank_name_td">{{$userAccounts->bank_name}}</th>
                                <td id="acc_name_td">{{$userAccounts->acc_name}}</th>
                                <td id="acc_no_td">{{$userAccounts->acc_number}}</th>
                                <th class="text-center">
                                    <button type="button" class="btn b-0 delete_button" data-toggle="modal" data-target="#delete"  data-accountdetails="{{$userAccounts->id}}">
                                        <i class="fas fa-solid fa-trash text-danger px-2"></i></i>
                                    </button>
                                </th>
                                <th class="text-center">
                                    <button type="button" class="btn b-0 edit_button" data-toggle="modal" data-target="#edit" data-accountdetails="{{$userAccounts->id}}">
                                        <i class="fas fa-solid fa-highlighter px-2" style="color:#43486e"></i>
                                    </button>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
        
        {{-- Delete modal --}}
        <div class="modal row" tabindex="-1" role="dialog" id="delete">
            <div class="modal-dialog" role="document">
                <div class="modal-content profile_bg_color">
                    <div class="modal-body text-center">
                        <p>Are you sure you want to delete this account detail ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary px-4">Exit</button>
                        <button class="btn btn-danger px-2 delete_account_number" >Continue</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit modal --}}
        <div class="modal row" tabindex="-1" role="dialog" id="edit">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header profile_header mx-0 px-4">
                        <p class="modal-title font-weight-bold"> UPDATE ACCOUNT</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-3 profile_bg_color">
                        <div class="row d-none" id="successMsg">
                            <div class="col-12">
                                <p class="text-center alert alert-warning my-0 py-0"></p>
                            </div>
                        </div>
                        <form id="update_account_detail">
                            <div class="row mb-1">
                                <div class="col-12 form-group">
                                    <label class="small font-weight-bold" for="bankname">Bank Name</label>
                                    <select class="form-control" id="bankname_modal" name="bankname" required autofocus autocomplete="bankname">
                                        @if(old('bankname'))
                                            <option value="{{old('bankname')}}">{{old('bankname')}}</option>
                                        @else
                                            <option value="">Select a bank</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{$bank->bank_name}}">{{$bank->bank_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>       
                                    <span class="text-danger error_text bankname_update_error" role="alert"></span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12">
                                    <label class="small font-weight-bold" for="accname">Account Name</label>
                                    <input id="accname_modal" name="accname" type="text" class="form-control"  value="@if(old('accname')) {{ old('accname') }} @endif" required autofocus autocomplete="accname"> 
                                <span class="text-danger error_text accname_update_error" role="alert"></span>
                                </div>
                            </div>
                
                            <div class="row mb-1">
                                <div class="col-12 pt-2">
                                    <label class="small font-weight-bold" for="accnumber">Account Number</label>
                                    <input id="accnumber_modal" name="accnumber" type="text" class="form-control" value="@if(old('accnumber'))  {{ old('accnumber') }} @endif"  required autocomplete="accnumber">        
                                    <span class="text-danger error_text accnumber_update_error" role="alert"></span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12 pt-3 text-right">
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary px-4">Exit</button>
                                    <button type="button" class="btn btn-primary px-2 update_account_number" >Continue</button>
                                </div>
                                <div class="col-12 text-center">
                                    <small class="text-danger">NOTE: Any payment made to wrong account as a result of your mistake would not be rectify</small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#showBankForm').click(function(){
                $('#alert_message #successMsg').addClass('d-none');
                $('.form-control').removeClass('is-invalid');
                $('span.error_text').text('');

                if($('#addAccountDetail').hasClass('d-none')){
                    $('#addAccountDetail').removeClass('d-none');
                    $('#account_record').addClass('d-none');
                    $('#showBankForm').html('New Bank Account <i class="fa-solid fa-square-xmark pl-2"></i>');
                }else{
                    $('#addAccountDetail').addClass('d-none');
                    $('#account_record').removeClass('d-none');
                    $('#showBankForm').html('New Bank Account');
                }
            })

            $('#saveBtn').click(function(){
                $('span.error_text').text('');
                $('#successMsg').addClass('d-none');
                $('.form-control').removeClass('is-invalid');
                $('#alert_message #successMsg p').removeClass('alert alert-warning');
                $('#alert_message #successMsg p').removeClass('alert-success');

                let bankname=$('#addAccountDetail #bankname').val();
                let accname=$('#addAccountDetail #accname').val();
                let accnumber=$('#addAccountDetail #accnumber').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        },
                    url:"{{route('save_user_bank_details')}}",
                    type:'POST',
                    data:{'bankname': bankname,'accname': accname,'accnumber': accnumber},
                    success:function(save){
                        if(save.status==0){
                            $.each(save.error, function(prefix,val){
                                    $('span.'+prefix+'_error' ).text(val[0]);
                                    $('.error_text').addClass('small');
                                    $('span.'+prefix+'_error' ).siblings('.form-control').addClass('is-invalid');
                            })
                        }else if(save.status==1){
                            $('.error_text').text('');
                            $('.form-control').removeClass('is-invalid');
                            $('#alert_message #successMsg').removeClass('d-none');
                            $('#alert_message #successMsg p').addClass('alert-warning');
                            $('#alert_message #successMsg p').html('<i class="fa-solid fa-triangle-exclamation pr-2"></i>'+save.msg);
                        }else{
                            $('#accountDetail').html(save);
                            $('#alert_message #successMsg').removeClass('d-none');
                            $('#alert_message #successMsg p').addClass('alert-success');
                            $('#alert_message #successMsg p').html('<i class="fa-solid fa-badge-check pr-2"></i> Account Details Saved Successfully');
                            $('#alert_message #successMsg p').addClass('font-weight-bold');               
                    }

                    },
                    error:function(error){
                        console.log(error);
                    }
                })

            })
                
                
            $("#delete").on('show.bs.modal',function (e){
                let bankaccount_id = $(e.relatedTarget).data('accountdetails');

                $('.delete_account_number').click(function(){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                            },
                        url:"{{route('delete_bank_details')}}",
                        type:'POST',
                        data:{'bankaccount_id': bankaccount_id},
                        success:function(deleted){
                            $('#alert_message #successMsg').addClass('d-none');
                            $('#accountDetail').html(deleted);
                            $('#alert_message #successMsg').removeClass('d-none');
                            $('#alert_message #successMsg p').addClass('alert-success');
                            $('#alert_message #successMsg p').html('<i class="fa-solid fa-badge-check pr-2"></i> Account Details Deleted successfully');
                            $('#alert_message #successMsg p').addClass('font-weight-bold'); 
                            $("div.modal-backdrop.show").removeClass('modal-backdrop')
                        },
                        error:function(error){
                            console.log(error);
                        }
                    })
                })
            });          
            
            
            $("#edit").on('show.bs.modal',function (e){
                let bankaccount_id = $(e.relatedTarget).data('accountdetails');

                let bank_name_td = $(e.relatedTarget).closest('tr').find('#bank_name_td').html();
                let acc_name_td = $(e.relatedTarget).closest('tr').find('#acc_name_td').html();
                let acc_no_td = $(e.relatedTarget).closest('tr').find('#acc_no_td').html();

                $('#update_account_detail select[name=bankname]').val($.trim(bank_name_td));
                $('#update_account_detail input[name=accname]').val($.trim(acc_name_td));
                $('#update_account_detail input[name=accnumber]').val($.trim(acc_no_td));

                $('.update_account_number').click(function(){
                    $('#alert_message #successMsg').addClass('d-none');
                    $('.form-control').removeClass('is-invalid');
                    $('span.error_text').text('');
                    $('.modal-body #successMsg').addClass('d-none');
                    $('#alert_message #successMsg p').removeClass('alert-success');
                
                    let bankname=$('#bankname_modal').val();
                    let accname=$('#accname_modal').val();
                    let accnumber=$('#accnumber_modal').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                            },
                        url:"{{route('edit_bank_details')}}",
                        type:'POST',
                        data:{'bankaccount_id': bankaccount_id, 'bankname': bankname, 'accname': accname, 'accnumber': accnumber},
                        success:function(updated){                    
                            if(updated.status==0){
                                $.each(updated.error, function(prefix,val){
                                        $('span.'+prefix+'_update_error' ).text(val[0]);
                                        $('.error_text').addClass('small');
                                        $('span.'+prefix+'_update_error' ).siblings('.form-control').addClass('is-invalid');
                                })
                            }else if(updated.status==1){
                                $('.error_text').text('');
                                $('.form-control').removeClass('is-invalid');
                                $('.modal-body #successMsg').removeClass('d-none');
                                $('.modal-body #successMsg p').html('<i class="fa-solid fa-triangle-exclamation pr-2"></i>'+updated.msg);
                            }else{
                                $('#accountDetail').html(updated);
                                $('#alert_message #successMsg').removeClass('d-none');
                                $('#alert_message #successMsg p').addClass('alert-success');
                                $('#alert_message #successMsg p').html('<i class="fa-solid fa-badge-check pr-2"></i> Account Details Updated Successfully');
                                $('#alert_message #successMsg p').addClass('font-weight-bold'); 
                                $("div.modal-backdrop.show").removeClass('modal-backdrop')
                            }
                        },
                        error:function(error){
                            console.log(error);
                        }
                    })
                })
            });            

        </script>
    </div>
</div>