@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:transparent;">{{ __('Sale') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Invoice">
                        @csrf


                        <div class="form-group row">
                            <label for="Customer_Id" class="col-md-4 col-form-label text-md-right">{{ __('Customer_Id') }}</label>

                            <div class="col-md-6">
                                <select name="Customer_Id" class="form-control">
                                <option>--- Select ---</option>
                                @foreach ($data['cus'] as $item)
                                <option value="{{ $item-> id }}"> {{ $item-> Customer_Name }}  </option>

                                @endforeach
                                </select>
                                @error('Customer_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Product_Id" class="col-md-4 col-form-label text-md-right">{{ __('Product_Id') }}</label>

                            <div class="col-md-6">
                                <select id="Product_Id" name="Product_Id" class="form-control">
                                <option>--- Select ---</option>
                                @foreach ($data['pro'] as $item)
                                
                                <option value="{{ $item->id }}"> {{ $item->Product_Name }}</option>

                                @endforeach
                                </select>
                                @error('Product_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="text" name="ppid" id="ppid" class="form-control"> 

                        <div class="form-group row">
                            <label for="Invoice_No" class="col-md-4 col-form-label text-md-right">{{ __('Invoice_No') }}</label>

                            <div class="col-md-6">
                                <input id="Invoice_No" type="text" class="form-control @error('Invoice_No') is-invalid @enderror" name="Invoice_No" value="{{ old('Invoice_No') }}" required autocomplete="Invoice_No" autofocus>

                                @error('Invoice_No')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Invoice_Date" class="col-md-4 col-form-label text-md-right">{{ __('Invoice_Date') }}</label>

                            <div class="col-md-6">
                                <input id="Invoice_Date" type="datetime-local" class="form-control @error('Invoice_Date') is-invalid @enderror" name="Invoice_Date" value="{{ old('Invoice_Date') }}" required autocomplete="Invoice_Date" autofocus>

                                @error('Invoice_Date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="marbal_length" class="col-md-4 col-form-label text-md-right">{{ __('marbal_length') }}</label>

                            <div class="col-md-6">
                                <input id="marbal_length" type="text" class="form-control @error('marbal_length') is-invalid @enderror" name="marbal_length" value="{{ old('marbal_length') }}" required autocomplete="marbal_length" autofocus>

                                @error('marbal_length')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="SubTotal" class="col-md-4 col-form-label text-md-right">{{ __('SubTotal') }}</label>

                            <div class="col-md-6">
                                <input id="SubTotal" type="text" class="form-control @error('SubTotal') is-invalid @enderror" name="SubTotal" value="{{ old('SubTotal') }}" required autocomplete="SubTotal" autofocus>

                                @error('SubTotal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="VAT_Per" class="col-md-4 col-form-label text-md-right">{{ __('VAT_Per') }}</label>

                            <div class="col-md-6">
                                <input id="VAT_Per" type="text" class="form-control @error('VAT_Per') is-invalid @enderror" name="VAT_Per" value="{{ old('VAT_Per') }}" required autocomplete="VAT_Per" autofocus>

                                @error('VAT_Per')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="VAT_Amount" class="col-md-4 col-form-label text-md-right">{{ __('VAT_Amount') }}</label>

                            <div class="col-md-6">
                                <input id="VAT_Amount" type="text" class="form-control @error('VAT_Amount') is-invalid @enderror" name="VAT_Amount" value="{{ old('VAT_Amount') }}" required autocomplete="VAT_Amount" autofocus>

                                @error('VAT_Amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Discount_Per" class="col-md-4 col-form-label text-md-right">{{ __('Discount_Per') }}</label>

                            <div class="col-md-6">
                                <input id="Discount_Per" type="text" class="form-control @error('Discount_Per') is-invalid @enderror" name="Discount_Per" value="{{ old('Discount_Per') }}" required autocomplete="Discount_Per" autofocus>

                                @error('Discount_Per')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Discount_Amount" class="col-md-4 col-form-label text-md-right">{{ __('Discount_Amount') }}</label>

                            <div class="col-md-6">
                                <input id="Discount_Amount" type="text" class="form-control @error('Discount_Amount') is-invalid @enderror" name="Discount_Amount" value="{{ old('Discount_Amount') }}" required autocomplete="Discount_Amount" autofocus>

                                @error('Discount_Amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Grand_Total" class="col-md-4 col-form-label text-md-right">{{ __('Grand_Total') }}</label>

                            <div class="col-md-6">
                                <input id="Grand_Total" type="text" class="form-control @error('Grand_Total') is-invalid @enderror" name="Grand_Total" value="{{ old('Grand_Total') }}" required autocomplete="Grand_Total" autofocus>

                                @error('Grand_Total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Total_Payment" class="col-md-4 col-form-label text-md-right">{{ __('Total_Payment') }}</label>

                            <div class="col-md-6">
                                <input id="Total_Payment" type="text" class="form-control @error('Total_Payment') is-invalid @enderror" name="Total_Payment" value="{{ old('Total_Payment') }}" required autocomplete="Total_Payment" autofocus>

                                @error('Total_Payment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="PaymentDue" class="col-md-4 col-form-label text-md-right">{{ __('PaymentDue') }}</label>

                            <div class="col-md-6">
                                <input id="PaymentDue" type="text" class="form-control @error('PaymentDue') is-invalid @enderror" name="PaymentDue" value="{{ old('PaymentDue') }}" required autocomplete="PaymentDue" autofocus>

                                @error('PaymentDue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="PaymentType" class="col-md-4 col-form-label text-md-right">{{ __('PaymentType') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="PaymentType" type="text" class="form-control @error('PaymentType') is-invalid @enderror" name="PaymentType" value="{{ old('PaymentType') }}" required autocomplete="PaymentType" autofocus> -->
                                <select name="PaymentType" class="form-control">
                                <option> -- Select --</option>
                                <option>Cheque</option>
                                <option>Cash</option>
                                
                                </select>
                                @error('PaymentType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Invoice') }}
                                </button>
                            </div>
                        </div>
</form>
</div>
                        </div>
                        </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="Product_Id"]').on('change', function() {
            var stateID = $(this).val();
            
            if(stateID) {
                $.ajax({
                    url: '/my/ajaxs/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                       
                      //  $('select[name="Product_Id"]').empty();
                        $.each(data, function(key, value) {
                            
                            marker = JSON.stringify(data);

                           // alert (marker);


                                                

                        var jsonObj = JSON.parse(marker);

                        for(var i = 0; i < jsonObj.length; i++)
                        {
                            
                            $('select[name="Product_Id"]').append("<option>"+ jsonObj[i]['Product_Name'] +'</option>');
                            $('#price').val(jsonObj[i]['Sell_Price']);
                            $("#ppid").val(jsonObj[i]['id']);
                        //     $('select[name="Sub_Category_Id2"]').append("<option>"+ jsonObj[i]['id']+'</option>');
                            $("#Product_Id option").val(function(idx, val) {
                        $(this).siblings('[value="'+ val +'"]').remove();
                        
                         });

                        
                        }
                                                    

                        });




                    }
                });
            }else{
                $('select[name="Product_Id"]').empty();
            }
        });

        
        $('#marbal_length').on( 'input',function() {
        var p=$('#price').val();
        var ml=$('#marbal_length').val();
        var res=p*ml;
        $('#SubTotal').val(res);

        
        });

        $('#VAT_Per').on( 'input',function() {
            var vper=$('#VAT_Per').val();
            var st=$('#SubTotal').val();
            var res=st/100*vper;
            
            $('#VAT_Amount').val(res);

        });


        $('#Discount_Per').on( 'input',function() {
            var vper=$('#Discount_Per').val();
            var st=$('#SubTotal').val();
            var res=st/100*vper;
            
            $('#Discount_Amount').val(res);
            var v=$('#VAT_Amount').val();
            var notot=parseInt(st)+parseInt(v);
            var pp=$('#Discount_Amount').val();
            var tot=notot-pp;


            $('#Grand_Total').val(tot);

        });





        $('#Total_Payment').on( 'input',function() {
            var vper=$('#Grand_Total').val();
            var st=$('#Total_Payment').val();
            var res=vper-st;
            
            $('#PaymentDue').val(res);


        });

    });







    
    

   
</script>
@endsection