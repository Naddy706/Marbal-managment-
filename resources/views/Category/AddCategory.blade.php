@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:transparent;">{{ __('Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Category">
                        @csrf



                        <div class="form-group row">
                            <label for="Category_Name" class="col-md-4 col-form-label text-md-right">{{ __('Category_Name') }}</label>

                            <div class="col-md-6">
                                <input id="Category_Name" type="text" class="form-control @error('Category_Name') is-invalid @enderror" name="Category_Name" value="{{ old('Category_Name') }}" required autocomplete="Category_Name" autofocus>

                                @error('Category_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Category') }}
                                </button>
                            </div>
                        </div>
</form>
</div>
                        </div>
                        </div>

</div>
@endsection