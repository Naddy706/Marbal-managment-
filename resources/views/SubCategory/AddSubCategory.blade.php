@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:transparent;">{{ __('Sub Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="/SubCategory">
                        @csrf



                        <div class="form-group row">
                            <label for="SubCategory_Name" class="col-md-4 col-form-label text-md-right">{{ __('SubCategory_Name') }}</label>

                            <div class="col-md-6">
                                <input id="SubCategory_Name" type="text" class="form-control @error('SubCategory_Name') is-invalid @enderror" name="SubCategory_Name" value="{{ old('SubCategory_Name') }}" required autocomplete="SubCategory_Name" autofocus>

                                @error('SubCategory_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Category_Id" class="col-md-4 col-form-label text-md-right">{{ __('Category_Id') }}</label>

                            <div class="col-md-6">
                                <select name="Category_Id" class="form-control">
                                @foreach ($d as $item)
                                <option value="{{ $item-> id }}"> {{ $item-> Category_Name }}  </option>

                                @endforeach
                                </select>
                                @error('Category_Id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SubCategory_Name') }}
                                </button>
                            </div>
                        </div>
</form>
</div>
                        </div>
                        </div>

</div>
@endsection