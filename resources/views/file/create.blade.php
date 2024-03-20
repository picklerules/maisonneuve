@extends('layouts.app')
@section('title', 'Upload a Document')
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

    <h2>Upload a Document</h2>
    <p>Share documents in PDF, ZIP, or DOC formats.</p>

    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title_en" class="form-label">Title (English)</label>
            <input type="text" class="form-control" id="title_en" name="title_en">
        </div>

        <div class="mb-3">
            <label for="title_fr" class="form-label">Title (French)</label>
            <input type="text" class="form-control" id="title_fr" name="title_fr">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input class="form-control" type="file" id="file" name="file">
            <div id="fileHelp" class="form-text">Only PDF, ZIP, or DOC files are allowed.</div>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
