@extends('layouts.app')
@section('title')
    @lang('lang.edit_doc_title')
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
<h2 class="text-center mt-4 mb-4 p-3 shadow rounded bg-light">@lang('lang.edit_doc_title')</h2>
<form method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="title_en">@lang('lang.article_title_en')</label>
        <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $file->title['en'] ?? '') }}">
    </div>
    <div class="form-group mb-3">
        <label for="title_fr">@lang('lang.article_title_fr')</label>
        <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $file->title['fr'] ?? '') }}">
    </div>
    <div class="mb-3">
            <label for="file" class="form-label">@lang('File') (@lang('optional'))</label>
            <input class="form-control" type="file" id="file" name="file">
            <div id="fileHelp" class="form-text">@lang('lang.upload_doc_form_text')</div>
        </div>
        @if($file->file_path)
            <div class="mb-3">
                <strong>@lang('Current file'):</strong> 
                <a href="{{ Storage::url($file->file_path) }}" download>{{ $file->title ? $file->title[app()->getLocale()]?? $file->title['en'] : '' }}</a> 
            </div>
        @endif
    <button type="submit" class="btn btn-primary mb-3">@lang('Update')</button>
</form>

@endsection
