@extends('layouts.app')
@section('content')
<div class="container">
<input type="text" id="proid" value="{{$data['pid']->id}}">
<input type="text" id="supid" value="{{$data['sid']->id}}">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:transparent;">{{ __('Stock') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Stock/{{$data['st']->id}}">
                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="Stock_Id" class="col-md-4 col-form-label text-md-right">{{ __('Stock_Id') }}</label>

                            <div class="col-md-6">
                                <input id="Stock_Id" type="text" class="form-control @error('Stock_Id') is-invalid @enderror" name="Stock_Id" value="{{$data['st']->Stock_Id}}" required autocomplete="Stock_Id" autofocus>

                                @error('Stock_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <label> Last date set : {{$data['st']->Stock_date}}</label>
                        <div class="form-group row">
                        
                            <label for="Stock_date" class="col-md-4 col-form-label text-md-right">{{ __('Stock_date') }}</label>

                            <div class="col-md-6">
                            
                                <input id="Stock_date" type="datetime-local" class="form-control @error('Stock_date') is-invalid @enderror" name="Stock_date" value="" required autocomplete="Stock_date" autofocus>

                                @error('Stock_date')
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
                                @foreach ($data['p'] as $item)
                                
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




                        <div class="form-group row">
                            <label for="Supplier_Id" class="col-md-4 col-form-label text-md-right">{{ __('Supplier_Id') }}</label>

                            <div class="col-md-6">
                                <select id="Supplier_Id" name="Supplier_Id" class="form-control">
                                <option>--- Select ---</option>
                                @foreach ($data['s'] as $item)
                                
                                <option value="{{ $item->id }}"> {{ $item->Supplier_Name }}</option>

                                @endforeach
                                </select>
                                @error('Supplier_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Box_Quantity" class="col-md-4 col-form-label text-md-right">{{ __('Box_Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="Box_Quantity" type="text" class="form-control @error('Box_Quantity') is-invalid @enderror" name="Box_Quantity" value="{{$data['st']->Box_Quantity}}" required autocomplete="Box_Quantity" autofocus>

                                @error('Box_Quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Box_Pieces" class="col-md-4 col-form-label text-md-right">{{ __('Box_Pieces') }}</label>

                            <div class="col-md-6">
                                <input id="Box_Pieces" type="text" class="form-control @error('Box_Pieces') is-invalid @enderror" name="Box_Pieces" value="{{$data['st']->Box_Pieces}}" required autocomplete="Box_Pieces" autofocus>

                                @error('Box_Pieces')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Toatl_Pieces" class="col-md-4 col-form-label text-md-right">{{ __('Toatl_Pieces') }}</label>

                            <div class="col-md-6">
                                <input id="Toatl_Pieces" type="text" class="form-control @error('Toatl_Pieces') is-invalid @enderror" name="Toatl_Pieces" value="{{$data['st']->Toatl_Pieces}}" required autocomplete="Toatl_Pieces" autofocus>

                                @error('Toatl_Pieces')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Marbal_Length" class="col-md-4 col-form-label text-md-right">{{ __('Marbal_Length') }}</label>

                            <div class="col-md-6">
                                <input id="Marbal_Length" type="text" class="form-control @error('Marbal_Length') is-invalid @enderror" name="Marbal_Length" value="{{$data['st']->Marbal_Length}}" required autocomplete="Marbal_Length" autofocus>

                                @error('Marbal_Length')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Total_Length" class="col-md-4 col-form-label text-md-right">{{ __('Total_Length') }}</label>

                            <div class="col-md-6">
                                <input id="Total_Length" type="text" class="form-control @error('Total_Length') is-invalid @enderror" name="Total_Length" value="{{$data['st']->Total_Length}}" required autocomplete="Total_Length" autofocus>

                                @error('Total_Length')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Stock') }}
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
$('#Box_Quantity, #Box_Pieces').change(function(){
    var rate = parseFloat($('#Box_Quantity').val()) || 0;
    var box = parseFloat($('#Box_Pieces').val()) || 0;

    $('#Toatl_Pieces').val(rate * box);    
});





$('#Marbal_Length, #Toatl_Pieces').change(function(){
    var rate = parseFloat($('#Marbal_Length').val()) || 0;
    var box = parseFloat($('#Toatl_Pieces').val()) || 0;

    $('#Total_Length').val(rate * box);    
});
});



document.getElementById('Product_Id').value=document.getElementById('proid').value;
    document.getElementById('Supplier_Id').value=document.getElementById('supid').value;
    
</script>
@endsection