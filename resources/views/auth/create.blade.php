@extends('layouts.app')
@section('title')
    @lang('lang.login_title')
@endsection
@section('content')
@if (!$errors->isEmpty())

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center mt-4 mb-4 p-3 shadow rounded bg-light">@lang('lang.login_title')</h2>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">

            <div class="card-body">
                <form method="post"> 
                    @csrf 
                    <div class="mb-3">
                        <label for="email" class="form-label">@lang('Email')</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"> 
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">@lang('Password')</label>
                        <input type="password" class="form-control" id="password" name="password" > 
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('lang.login_title')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection