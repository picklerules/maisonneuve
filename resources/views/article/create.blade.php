@extends('layouts.app')
@section('title', 'Forum')
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
<h1 class="mt-5 mb-4">Forum</h1>
<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('article.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titre_en" class="form-label">Title in English</label>
                        <input type="text" class="form-control" id="titre_en" name="titre_en" value="{{ old('titre_en') }}">
                    </div>
                    <div class="mb-3">
                        <label for="titre_fr" class="form-label">Titre en Français</label>
                        <input type="text" class="form-control" id="titre_fr" name="titre_fr" value="{{ old('titre_fr') }}">
                    </div>
                    <div class="mb-3">
                        <label for="contenu_en" class="form-label">Content in English</label>
                        <textarea class="form-control" id="contenu_en" name="contenu_en">{{ old('contenu_en') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contenu_fr" class="form-label">Contenu en Français</label>
                        <textarea class="form-control" id="contenu_fr" name="contenu_fr">{{ old('contenu_fr') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
