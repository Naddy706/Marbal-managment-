@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:transparent;">{{ __('Customer_Id') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Customer/{{$data->id}}">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="Customer_Id" class="col-md-4 col-form-label text-md-right">{{ __('Customer_Id') }}</label>

                            <div class="col-md-6">
                                <input id="Customer_Id" type="text" class="form-control @error('Customer_Id') is-invalid @enderror" name="Customer_Id" value="{{$data->Customer_Id}}" required autocomplete="Customer_Id" autofocus>

                                @error('Customer_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Customer_Name" class="col-md-4 col-form-label text-md-right">{{ __('Customer_Name') }}</label>

                            <div class="col-md-6">
                                <input id="Customer_Name" type="text" class="form-control @error('Customer_Name') is-invalid @enderror" name="Customer_Name" value="{{$data->Customer_Name}}" required autocomplete="Customer_Name" autofocus>

                                @error('Customer_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Customer_Address" class="col-md-4 col-form-label text-md-right">{{ __('Customer_Address') }}</label>

                            <div class="col-md-6">
                                <input id="Customer_Address" type="text" class="form-control @error('Customer_Address') is-invalid @enderror" name="Customer_Address" value="{{ $data->Customer_Address }}" required autocomplete="Customer_Address" autofocus>

                                @error('Customer_Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="City" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="City" type="text" class="form-control @error('City') is-invalid @enderror" name="City" value="{{ $data->City }}" required autocomplete="City" autofocus>

                                @error('City')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Contact_No" class="col-md-4 col-form-label text-md-right">{{ __('Contact_No') }}</label>

                            <div class="col-md-6">
                                <input id="Contact_No" type="text" class="form-control @error('Contact_No') is-invalid @enderror" name="Contact_No" value="{{ $data->Contact_No }}" required autocomplete="Contact_No" autofocus>

                                @error('Contact_No')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                       
                        <div class="form-group row">
                            <label for="Contact_No2" class="col-md-4 col-form-label text-md-right">{{ __('Contact_No2') }}</label>

                            <div class="col-md-6">
                                <input id="Contact_No2" type="text" class="form-control @error('Contact_No2') is-invalid @enderror" name="Contact_No2" value="{{ $data->Contact_No2 }}" required autocomplete="Contact_No2" autofocus>

                                @error('Contact_No2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="Email" type="email" class="form-control @error('Email') is-invalid @enderror" name="Email" value="{{ $data->Email }}" required autocomplete="Email">

                                @error('Email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Customer') }}
                                </button>
                            </div>
                        </div>
</form>
</div>
                        </div>
                        </div>

</div>
@endsection