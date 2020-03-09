@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>

<input id="cid"  value="{{$data['ci']->id }}">
<input id="sid"  value="{{$data['si']->id }}">
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:transparent;">{{ __('Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Product/{{ $data['a']->id }}">
                        @csrf
                        {{ method_field('PUT') }}


                        <div class="form-group row">
                            <label for="Product_Id" class="col-md-4 col-form-label text-md-right">{{ __('Product_Id') }}</label>

                            <div class="col-md-6">
                                <input id="Product_Id" type="text" class="form-control @error('Product_Id') is-invalid @enderror" name="Product_Id" value="{{  $data['a']->Product_Id }}" required autocomplete="Product_Id" autofocus>

                                @error('Product_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Product_Name" class="col-md-4 col-form-label text-md-right">{{ __('Product_Name') }}</label>

                            <div class="col-md-6">
                                <input id="Product_Name" type="text" class="form-control @error('Product_Name') is-invalid @enderror" name="Product_Name" value="{{$data['a']->Product_Name}}" required autocomplete="Product_Name" autofocus>

                                @error('Product_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Category_Id" class="col-md-4 col-form-label text-md-right">{{ __('Category_Id') }}</label>

                            <div class="col-md-6">
                                <select id="Category_Id" name="Category_Id" class="form-control">
                                <option>--- Select ---</option>
                                @foreach ($data['c'] as $item)
                                
                                <option value="{{ $item->id }}"> {{ $item->Category_Name }}</option>

                                @endforeach
                                </select>
                                @error('Category_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Sub_Category_Id" class="col-md-4 col-form-label text-md-right">{{ __('Sub_Category_Id') }}</label>
                            <div class="col-md-6">
                                <select id="Sub_Category_Id" name="Sub_Category_Id" class="form-control">
               
                                </select>
                                @error('Sub_Category_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" >
                            <label for="Sub_Category_Id2" class="col-md-4 col-form-label text-md-right">{{ __('Sub_Category_Id2') }}</label>
                            <div class="col-md-6">
                                <select id="Sub_Category_Id2" name="Sub_Category_Id2" class="form-control">
               
                                </select>
                                
                            </div>
                        </div>
                        <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">



                        <div class="form-group row">
                            <label for="Features" class="col-md-4 col-form-label text-md-right">{{ __('Features') }}</label>

                            <div class="col-md-6">
                                <input id="Features" type="text" class="form-control @error('Features') is-invalid @enderror" name="Features" value="{{$data['a']->Features}}" required autocomplete="Features" autofocus>

                                @error('Features')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="Price" type="text" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{$data['a']->Price}}" required autocomplete="Price" autofocus>

                                @error('Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Sell_Price" class="col-md-4 col-form-label text-md-right">{{ __('Sell_Price') }}</label>

                            <div class="col-md-6">
                                <input id="Sell_Price" type="text" class="form-control @error('Sell_Price') is-invalid @enderror" name="Sell_Price" value="{{$data['a']->Sell_Price}}" required autocomplete="Sell_Price" autofocus>

                                @error('Sell_Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Product') }}
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
        $('select[name="Category_Id"]').on('change', function() {
            var stateID = $(this).val();
            
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                       
                        $('select[name="Sub_Category_Id"]').empty();
                        $('select[name="Sub_Category_Id2"]').empty();
                        $.each(data, function(key, value) {
                            
                            marker = JSON.stringify(data);

                            $('select[name="Sub_Category_Id"]').empty();
                        $('select[name="Sub_Category_Id2"]').empty();
                                                

                        var jsonObj = JSON.parse(marker);

                        for(var i = 0; i < jsonObj.length; i++)
                        {
                            
                            $('select[name="Sub_Category_Id"]').append("<option>"+ jsonObj[i]['SubCategory_Name'] +'</option>');
                            $('select[name="Sub_Category_Id2"]').append("<option>"+ jsonObj[i]['id']+'</option>');
                            $("#Sub_Category_Id option").val(function(idx, val) {
                        $(this).siblings('[value="'+ val +'"]').remove();
                        
                        });

                        
                        }
                                                    

                        });



                    }
                });
            }else{
                $('select[name="Sub_Category_Id"]').empty();
                $('select[name="Sub_Category_Id2"]').empty();
            }
        });

        
        $('select[name="Sub_Category_Id"]').on('change', function() {
            var stateID = $(this).val();
            
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                       
                       
                        $.each(data, function(key, value) {
                            
                            marker = JSON.stringify(data);

                      

                        var jsonObj = JSON.parse(marker);

                        for(var i = 0; i < jsonObj.length; i++)
                        {
                            if(jsonObj[i]['SubCategory_Name']==$("#Sub_Category_Id").val()){
                                var a=jsonObj[i]['id'];
                                alert(a);
                            }

                        
                        }
                                                    

                        });



                    }
                });
            }else{
                
            }
        });
        

        // $('select[name="Sub_Category_Id"]').on('change', function() {
        //     var s2 = $('select[name="Sub_Category_Id2"]').val();
        //     var s1 = $('select[name="Sub_Category_Id"]').val();

        //     s2=s1;
        //     alert(s1);
        // });
        
    });

    
    document.getElementById('Category_Id').value=document.getElementById('cid').value;
    document.getElementById('Sub_Category_Id').value=document.getElementById('sid').value;
    

   
</script>

@endsection