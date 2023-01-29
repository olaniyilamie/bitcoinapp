@extends('layouts.master')
@section('content')
    @if (session('successful'))
    <div class="alert alert-success alert-dismissible fade show mb-1 py-1" role="alert">
        <p class="text-center">{{ session('successful') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-12 p-0">
            <h2 class="miniheading rounded">SEPHORA, NORDSTROM, NIKE, FOOTLOCKER, RAZER ... <i class="fab fa-cc-mastercard"></i></h2>
        </div>
    </div>
    
    {{ Form::open(array('url' => route('sellbtc'), 'method' => 'POST' )) }}
    @csrf
    <div class="row transaction_section d-flex justify-content-around pt-3 pb-2">
        <div class="col-md-4 px-0">
            <div class="row">    
                <div class="col-12">
                    <p class="font-weight-bolder ">Select Itunes Card Type <span class="font-weight-bolder text-danger">*</span></p>
                </div>
                <div class="col-12">
                    <ul class="px-0 py-0">
                        <li class="giftcardType">
                            <label for="0"> 
                                <input name="gt_others2" type="radio" value="0" checked="checked" id="0">
                                USA Sephora($100-$500 single) ₦379
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="1">
                                <input name="gt_others2" type="radio" value="1" id="1">
                                USA Sephora($50-$99 single) ₦347
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="2">
                                <input name="gt_others2" type="radio" value="2" id="2">
                                USA Nordstrom ($100-$500 single) ₦406
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="3">
                                <input name="gt_others2" type="radio" value="3" id="3">
                                USA NordStrom($50 single) ₦347
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="4">
                                <input name="gt_others2" type="radio" value="4" id="4">
                                Nike($100-$200) ₦0
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="5">
                                <input name="gt_others2" type="radio" value="5" id="5">
                                Nike ($300 single & above) ₦400
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="6">
                                <input name="gt_others2" type="radio" value="6" id="6">
                                Nike ($50 single) ₦0
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="7">
                                <input name="gt_others2" type="radio" value="7" id="7">
                                Footlocker ₦395 ($100-$500) ₦364
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="8">
                                <input name="gt_others2" type="radio" value="8" id="8">
                                Macy ($100-$300) ₦339
                            </label>
                        </li>
                        <li class="giftcardType">
                            <label for="9">
                                <input name="gt_others2" type="radio" value="9" id="9">
                                Razer Gold ₦430 ($50-$200) ₦410
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <label class="font-weight-bold">Quantity <span class="text-danger">*</span></label>
                </div>                        
                <div class="col-12 form-group{{ $errors->has('itunesQty') ? ' has-error' : '' }}">
                    <input type="number" name="itunesQty" id="quantity" placeholder="560" min="200" max="2000" class="form-control form-control-sm" value="{{ old('itunesQty')}}" required>
                    <small class="text-muted" id="qtyMsg">Please enter a number from 200 to 2000.</small>
                    <small class="text-danger"><br>{{ $errors->first('itunesQty') }}</small>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-12">
                    <label class="font-weight-bold">You'll Receive <span class="text-danger">*</span></label>
                </div>
                <div class="col-12 input-group">
                    <span class="input-group-text form-control-sm">₦</span>
                    <input type="number" name="toReceive" id="toReceive" class="form-control form-control-sm rounded" value="{{ old('toReceive')}}" readonly>
                </div>
                @error('toReceive')
                    <div class="col-12">
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>
            <div class="row my-1">
                <div class="col-12">
                    <label class="font-weight-bold" for="evidence">Upload Images <span class="text-danger pl-2">*</span></label>
                </div>
                <div class="col-12">
                    <input type="file" id="evidence" name="evidence[]" accept="image/*" multiple><br>
                    <small class="text-muted">Accepted file types: jpg, gif, png, jpeg. Max file size: 32 MB, Max images is 3</small>
                </div>
                <div class="col-12" id="preview">
        
                </div>
            </div>
            <div class="row my-1">
                <div class="col-12">
                    <label  class="font-weight-bold" for="bank_details">Bank <span class="text-danger">*</span></label>
                </div>

                <div class="col-12 form-group{{ $errors->has('bank_details') ? ' has-error' : '' }}">
                    <select name="bank_details" id="bank_details" class="form-control form-control-sm font-weight-bold" required>
                        <option> Select Account </option>
                        @if($account == 1){
                            @foreach($userAccount as $account_details)
                                <option value="{{$account_details->id}}">{{$account_details->acc_name}}  {{$account_details->bank_name}} (<span class="font-weight-bold">{{$account_details->acc_number}}</span>)</option>
                            @endforeach
                        }
                        @else
                        <option value="guest">Add a new bank detail</option>
                        @endif
                    </select>
                    <small><a href="@guest{{route('login')}}@else{{route('user_profile')}}@endguest" class="btn btn-sm btn-outline-primary py-0" >Add a new bank detail</a></small>
                    @error('bank_details')<small class="text-danger">{{ $errors->first('bank_details') }}</small>@enderror
                </div>
            </div>
        </div>
        <div class="col-12 my-1">
            <label for="" class="font-weight-bold">Card Denomination(Optional)</label>
            <textarea name="" id="" class="form-control form-control-sm" placeholder="Pls input your card denomination or blurry card codes e.g. $25*4, $50*5, $100*10, etc." 
            rows="4"></textarea>
        </div>
        <div class="col-12 my-1">
            <div class="row my-2">
                <div class="col-12">
                    <p  class="font-weight-bold my-0">Trade Terms <span class="text-danger pl-2">*</span></p>
                </div>
                <div class="col-12">
                    <input type="checkbox" name="" id="" type="checkbox" value="1">
                    <small class="my-0 font-weight-bold">Statement of Legality</small>
                </div>
                <div class="col-12 my-0 text-justify">
                    <small>
                        You hereby warrant, assure, represent and state that the items you are transacting on, selling, loading or offering for sale on this website(Gchub.ng) was acquired through legal means. You further state that you did not in any manner act as agent or alter ego of the Website in the acquisition of the items. You hereby, specifically state that the items were not stolen or obtained through fraudulent means
                        <b>Note: ₦30 bank transfer charge will be deducted.</b> We won't be held responsible for funding a wrong Account Number provided by you. Pls crosscheck the info you filled.
                        By Clicking the </b>"Sell Now"</b> button, you agree that you have read and agreed to our Terms of Service and you understand that all transfers are final and cannot be reversed.
                    </small>
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            @if (Auth::check())
                <input type="submit" name="submit" value="SELL NOW" class="btn btn-sm sellnowBtn btn-block my-2 font-weight-bold">
            @else
                <p class="font-weight-bold my-2">Click here to 
                    <a class="text-dark btn btn-outline-dark py-0" data-toggle="modal" data-target="#login">LOGIN</a> or
                    <a class="text-dark btn btn-outline-dark py-0" data-toggle="modal" data-target="#register">REGISTER</a> to Submit your order.
                </p>
            @endif
        </div>
    </div>
{{ Form:: close()}}
    
    
<script type="text/javascript" src="{{ URL::asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("input[type=radio][name=gt_others2]").on("change", itunesPrice );
        $("#quantity").on("keyup", itunesPrice );

        function itunesPrice(){
            let checked=$("input[name='gt_others2']:checked").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                url:"{{route('get_other2_price')}}",
                type:'POST',
                data:{'key': checked },
                dataType:'text',
                success:function(itunesRate){
                    console.log('here');
                    if($('#quantity').val() !=='' && $('#quantity').val() < 200 ){
                        $('#qtyMsg').html('quantity cannot be less than 200');
                        $('#qtyMsg').removeClass('text-muted');
                        $('#qtyMsg').addClass('text-danger');
                        let itunesValue=$('#quantity').val();
                        let toReceive = itunesValue * itunesRate;
                        $('#toReceive').val(toReceive);
                        $('.sellnowBtn').prop('disabled', true);
                    }else if($('#quantity').val() !=='' && $('#quantity').val() > 2000){
                        $('#qtyMsg').html('quantity cannot be greater than 2000');
                        $('#qtyMsg').removeClass('text-muted');
                        $('#qtyMsg').addClass('text-danger');
                        let itunesValue=$('#quantity').val();
                        let toReceive = itunesValue * itunesRate;
                        $('#toReceive').val(toReceive);
                        $('.sellnowBtn').prop('disabled', true);
                    }else{
                        $('#qtyMsg').html('Please enter a number from 50 to 2000');
                        $('#qtyMsg').addClass('text-muted');
                        let itunesValue=$('#quantity').val();
                        let toReceive = itunesValue * itunesRate;
                        $('#toReceive').val(toReceive);
                        $('.sellnowBtn').prop('disabled', false);
                    }
                    console.log('here now');
                },
                error:function(error){
                    console.log(error);
                }
            })
        }

        $("#evidence").change(function(event) {
            $('#preview').html('');
            var fileList = this.files; 
            for(var i = 0; i < fileList.length; i++){
                //get a blob 
                var t = window.URL || window.webkitURL;
                var objectUrl = t.createObjectURL(fileList[i]);
                $('#preview').append('<img src="' + objectUrl + '" style="width: 33.33%; height:auto" class="img-fluid p-2"/>');
            }
           
        })
        
        $('#bank_details').change(function(){
                if($(this).val() == 'guest'){
                    let url = "{{route('login')}}"
                    window.location.replace(url);
                }
            })

    })
</script>
@endsection