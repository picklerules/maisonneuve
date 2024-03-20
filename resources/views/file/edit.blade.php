@extends('layouts.app')
@section('title', 'Edit File')
@section('content')

<form method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title_en">Title in English</label>
        <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $file->title['en'] ?? '') }}">
    </div>
    <div class="form-group">
        <label for="title_fr">Title in French</label>
        <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $file->title['fr'] ?? '') }}">
    </div>
    <div class="mb-3">
            <label for="file" class="form-label">@lang('File') (optional)</label>
            <input class="form-control" type="file" id="file" name="file">
            <div id="fileHelp" class="form-text">@lang('lang.upload_doc_form_text')</div>
        </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
