@extends('layouts.app')
@section('title')
    @lang('lang.upload_doc_title')
@endsection
@section('content')
@if(!$errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>     
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>                
@endif
<div class="container mt-4">

    <h2>@lang('lang.upload_doc')</h2>
    <p>@lang('lang.upload_doc_text')</p>

    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title_en" class="form-label">@lang('lang.article_title_en')</label>
            <input type="text" class="form-control" id="title_en" name="title_en" value="{{old('title_en')}}">
        </div>

        <div class="mb-3">
            <label for="title_fr" class="form-label">@lang('lang.article_title_fr')</label>
            <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{old('title_fr')}}">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">@lang('File')</label>
            <input class="form-control" type="file" id="file" name="file">
            <div id="fileHelp" class="form-text">@lang('lang.upload_doc_form_text')</div>
        </div>

        <button type="submit" class="btn btn-primary">@lang('lang.upload_doc_button')</button>
    </form>
</div>
@endsection
