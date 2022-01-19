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
            <h2 class="miniheading rounded">ITUNES <i class="fab fa-itunes"></i></h2>
        </div>
    </div>
    
    {{ Form::open(array('url' => route('sellbtc'), 'method' => 'POST' )) }}
    @csrf
    <div class="row transaction_section d-flex justify-content-around pt-3 pb-2">
        <div class="col-md-4">
            <div class="row">    
                <div class="col-12">
                    <p class="font-weight-bolder ">Select Itunes Card Type <span class="font-weight-bolder text-danger">*</span></p>
                </div>
                <div class="col-12">
                    <ul class="px-0 py-0">
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="USA_($100-$200)_387" checked="checked" id="itunes_usa100-200">
                            <label for="itunes_usa100-200">USA iTunes card($100-$200 single) <span class="amount">₦387</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="USA_($50 single)_387" id="itunes_usa50">
                            <label for="itunes_usa50">USA iTunes card($50 USA iTunes ($50 single) <span class="amount">₦387</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="USA_($300-$2,000)_387" id="itunes_usa300-2000">
                            <label for="itunes_usa300-2000">USA iTunes ($300-$2,000 single) <span class="amount">₦387</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="USA_<$100_230" id="itunes_usa100-230">
                            <label for="itunes_usa100-230">USA iTunes(Others e.g $25, $75, $65, etc) <span class="amount">₦230</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="CAD_248" id="itunes_cad">
                            <label for="itunes_cad">CADiTunes <span class="amount">₦248</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="AUD_296" id="itunes_aud">
                            <label for="itunes_aud">AUD Itunes <span class="amount">₦295</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="NZD_267" id="itunes_nzd">
                            <label for="itunes_nzd">NZD iTunes <span class="amount">₦267</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="USA_(100-200)_368" id="itunes_usa100-200">
                            <label for="itunes_usa100-200">USA iTunes Ecode(100-200) <span class="amount">₦368</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="USA_(50)_368" id="itunes_usa50">
                            <label for="itunes_usa50">USA iTunes Ecode(50) <span class="amount">₦368</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="EURO_379" id="itunes_euro">
                            <label for="itunes_euro">EURO iTunes <span class="amount">₦379</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="Uk_497" id="itunes_uk">
                            <label for="itunes_uk">Uk iTunes <span class="amount">₦497</span></label>
                        </li>
                        <li class="giftcardType">
                            <input name="gt_itunes" type="radio" value="CHF_511" id="itunes_chf">
                            <label for="itunes_chf">CHF iTunes <span class="amount">₦511</span></label>
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
                    <input type="number" name="itunesQty" id="quantity" placeholder="560" min="50" max="2000" class="form-control form-control-sm" value="{{ old('itunesQty')}}" required>
                    <small class="text-muted" id="qtyMsg">Please enter a number from 50 to 2000.</small>
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
                    <select name="bank_details" id="" class="form-control form-control-sm text-center" required>
                        <option> --Select Account-- </option>
                        <option value="">--Select Account--</option>
                    </select>
                    <small><a href="" class="btn btn-sm btn-outline-primary py-0" >Add a new bank detail</a></small>
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
        <div class="col-12">
            <input type="submit" name="submit" value="SELL NOW" class="btn btn-sm sellnowBtn btn-block my-2 font-weight-bold">
        </div>
    </div>
{{ Form:: close()}}
    
    
<script type="text/javascript" src="{{ URL::asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#quantity").keyup("input", function(){
            let checked=$("input[name='gt_itunes']:checked").siblings().children('.amount').html();
            let itunesRate=checked.substring(1);
                if($(this).val() < 50 ){
                    $('#qtyMsg').html('quantity cannot be less than 50');
                    $('#qtyMsg').removeClass('text-muted');
                    $('#qtyMsg').addClass('text-danger');
                    let itunesValue=$(this).val();
                    let toReceive = itunesValue * itunesRate;
                    $('#toReceive').val(toReceive);
                }else if($(this).val() > 2000){
                    $('#qtyMsg').html('quantity cannot be greater than 2000');
                    $('#qtyMsg').removeClass('text-muted');
                    $('#qtyMsg').addClass('text-danger');
                    let itunesValue=$(this).val();
                    let toReceive = itunesValue * itunesRate;
                    $('#toReceive').val(toReceive);
                }else{
                    $('#qtyMsg').html('Please enter a number from 50 to 2000');
                    $('#qtyMsg').addClass('text-muted');
                    let itunesValue=$(this).val();
                    let toReceive = itunesValue * itunesRate;
                    $('#toReceive').val(toReceive);

                }
        })

        
        $("input[type=radio][name=gt_itunes]").change(function() {
            let checked=$("input[name='gt_itunes']:checked").siblings().children('.amount').html();
            let itunesRate=checked.substring(1);
            let itunesValue=$('#quantity').val();
            let toReceive = itunesValue * itunesRate;
            $('#toReceive').val(toReceive);

        });

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
        


    })
</script>
@endsection