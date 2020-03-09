@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:transparent;">{{ __('Supplier') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Supplier/{{$data->id}}">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="Supplier_Id" class="col-md-4 col-form-label text-md-right">{{ __('Supplier_Id') }}</label>

                            <div class="col-md-6">
                                <input id="Supplier_Id" type="text" class="form-control @error('Supplier_Id') is-invalid @enderror" name="Supplier_Id" value="{{$data->Supplier_Id}}" required autocomplete="Supplier_Id" autofocus>

                                @error('Supplier_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Supplier_Name" class="col-md-4 col-form-label text-md-right">{{ __('Supplier_Name') }}</label>

                            <div class="col-md-6">
                                <input id="Supplier_Name" type="text" class="form-control @error('Supplier_Name') is-invalid @enderror" name="Supplier_Name" value="{{$data->Supplier_Name}}" required autocomplete="Supplier_Name" autofocus>

                                @error('Supplier_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="Address" value="{{ $data->Address }}" required autocomplete="Address" autofocus>

                                @error('Address')
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Supplier') }}
                                </button>
                            </div>
                        </div>
</form>
</div>
                        </div>
                        </div>

</div>
@endsection