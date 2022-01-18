@extends('layouts.master')
@section('content')
    @if (session('successful'))
    <div class="alert alert-success alert-dismissible fade show mb-1 py-1" role="alert">
        <p class="text-center">{{ session('successful') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row  text-light" id="ethcalculator">
        <div class="col-12 py-5 text-center font-weight-bolder" id="bitoverlay">
            <div class="row">
                <div class="col-12 pt-3">
                    <h1>ETHEREUM CALCULATOR</h1>
                    <p class="font-weight-normal">kjkwhjkjkwfn jhwfk hjwfh hjwehkj ewhjhwk hjwhj hwfh
                    <br>jhfjalk jrwefljkwe jfwljlkjfw jfwljweljehwjhj wjfeljfkl
                    <br>jefjs ejwhfj jwfelkjl.</p>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12">
                    <form action="#" method="post" class="d-flex justify-content-center">
                        <div class="d-flex mx-3">
                            <input type="number" name="coinQty" id="coinQty" placeholder="1" class="form-control form-control-sm mx-2 border border-warning bg-transparent text-white">
                            <select class="border rounded" name="typeEcurrency" id="typeEcurrency">
                                <option value="eth">ETH</option>
                            </select>
                        </div>

                        <div class="mx-md-2">=</div>

                        <div class="d-flex mx-3">
                            <input type="number" name="currencyValue" id="currencyValue" placeholder="940045" class="form-control form-control-sm mx-2 border border-warning bg-transparent text-white" readonly>
                            <select  class="border rounded" name="typeCurrencyVal" id="typeCurrencyVal">
                                <option value="eur">EUR</option>
                                <option value="usd">USD</option>
                                <option value="inr">INR</option>
                                <option value="bdt">BDT</option>
                                <option value="ng">NGN</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row py-3">
                <div class="col-12">
                    <form action="#" method="post" class="d-flex justify-content-center">
                        <div class="d-flex mx-3">
                            <input type="number" name="currencyValue2" id="currencyValue2"placeholder="940045" class="form-control form-control-sm mx-2 border border-warning bg-transparent text-white" readonly>
                            <select  class="border rounded" name="typeCurrencyVal2" id="typeCurrencyVal2">
                                <option value="eur">EUR</option>
                                <option value="usd">USD</option>
                                <option value="inr">INR</option>
                                <option value="bdt">BDT</option>
                                <option value="ng">NGN</option>
                            </select>
                        </div>

                        <div class="mx-md-2">=</div>

                        <div class="d-flex mx-3">
                            <input type="number" name="coinQty2" id="coinQty2"placeholder="1" class="form-control form-control-sm mx-2 border border-warning bg-transparent text-white">
                            <select class="border rounded" name="typeEcurrency2" id="typeEcurrency2">
                                <option>ETH</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 p-0">
            <h2 class="rounded" id="buybit">SELL ETHEREUM <i class="fab fa-ethereum pl-3"></i></h2>
        </div>
    </div>    
    {{ Form::open(array('url' => route('sellbtc'), 'method' => 'POST' )) }}
        @csrf
        <div class="row d-flex justify-content-around" id="transaction_section">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12">
                        <h5>Ecurrency <span class="font-weight-bolder text-danger">*</span></h5>
                    </div>
                    
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 form-group{{ $errors->has('ethereum') ? ' has-error' : '' }}">
                                <input name="ethereum" type="radio" value="ethereum" checked="checked" id="ethereum">
                                <label for="ethereum">Ethereum ₦<span id="ethereumValue">562</span></label><br>
                                <small class="text-danger">{{ $errors->first('ethereum') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-1">
                    <div class="col-12">
                        <h5>Bank <span class="font-weight-bolder text-danger">*</span></h5>
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
                <div class="row my-1">
                    <div class="col-12">
                        <h5>Sending from ? <span class="font-weight-bolder text-danger">*</span></h5>
                    </div>
                    <div class="col-12 input-group">
                        <select name="sendfrom" id="sendfrom" class="form-control form-control-sm">
                            <option value="auto">Paxful (Auto) </option>
                            <option value="manual">Paxful (Manual) </option>
                            <option value="non">Non Paxful (e.g Blockchain, Cashapp, Coinapp e.tc) </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12">
                        <h5>Quantity <span class="font-weight-bolder text-danger">*</span></h5>
                    </div>
                    
                    <div class="col-12 form-group{{ $errors->has('ethereumQty') ? ' has-error' : '' }}">
                        <input type="number" name="ethereumQty" id="quantity" placeholder="560" min="10" class="form-control form-control-sm" value="{{ old('ethereumQty')}}" required>
                        <small class="text-muted" id="qtyMsg">Please enter a number from 10 to 9999.</small>
                        <small class="text-danger"><br>{{ $errors->first('ethereumQty') }}</small>
                    </div>
                </div>
                <div class="row my-1">
                    <div class="col-12">
                        <h5>You'll Receive <span class="font-weight-bolder text-danger">*</span></h5>
                    </div>
                    <div class="col-12 input-group">
                        <span class="input-group-text form-control-sm">₦</span>
                        <input type="number" name="toReceive" id="toReceive" class="form-control form-control-sm rounded" value="{{ old('toReceive')}}" readonly>
                    </div>
                    @error('toReceive')
                        <div class="col-12">
                            <small class="text-danger">{{$message}}</small>
                        </div>
                    @enderror
                </div>
                <div class="row my-1">
                    <div class="col-12">
                        <h5>You'll Send <span class="font-weight-bolder text-danger">*</span></h5>
                    </div>
                    <div class="col-12 input-group">
                        <input type="number" name="sendQty" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="col-12 input-group">
                <input type="submit" name="submit" value="SELL NOW" class="btn btn-sm btn-dark btn-block my-2 font-weight-bold">
            </div>
            <div class="col-12">
                <p><b>Note: ₦30 bank transfer charge will be deducted.</b> We won't be held responsible for funding a wrong <b>Account Number</b> provided by you. Pls crosscheck the info you filled.
                    By Clicking the <b>"Sell Now"</b> button, you agree that you have read and agreed to our <a href="">Terms of Service</a> and you understand that all transfers are final and cannot be reversed.
                </p>
            </div>
        </div>
    {{ Form::close() }}
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#quantity").keyup("input", function(){
                let ethereumValue=$('#ethereumValue').html();
                if($(this).val() < 10 ){
                    $('#qtyMsg').html('quantity cannot be less than 10');
                    $('#qtyMsg').removeClass('text-muted');
                    $('#qtyMsg').addClass('text-danger');
                    let ethereumQty=$(this).val();
                    let toReceive = ethereumQty * ethereumValue;
                    $('#toReceive').val(toReceive);
                }else if($(this).val() > 9999){
                    $('#qtyMsg').html('quantity cannot be greater than 9999');
                    $('#qtyMsg').removeClass('text-muted');
                    $('#qtyMsg').addClass('text-danger');
                    let ethereumQty=$(this).val();
                    let toReceive = ethereumQty * ethereumValue;
                    $('#toReceive').val(toReceive);
                }else{
                    $('#qtyMsg').html('Please enter a number from 10 to 9999');
                    $('#qtyMsg').addClass('text-muted');
                    let ethereumQty=$(this).val();
                    let toReceive = ethereumQty * ethereumValue;
                    $('#toReceive').val(toReceive);

                }
            })

            $('#coinQty').keyup("input", function(){
                //for example, let say one bitcoin is $1000
                let coinQty = $(this).val();
                let ecurrency=$('#typeEcurrency').val();
                let currencyType=$('#typeCurrencyVal').val();

                if(ecurrency == 'btc' && currencyType == 'eur'){
                    let currencyValue=$('#currencyValue').val(coinQty*1000*562);
                }

            })


        })
    </script>
@endsection