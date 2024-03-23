@extends('layouts.app')
@section('title')
    @lang('lang.edit_article_title')
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
<h2 class="text-center mt-4 mb-4 p-3 shadow rounded bg-light">@lang('lang.edit_article_title')</h2>
<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <form method="post" class="needs-validation" novalidate>
                    @csrf 
                    @method('PUT')
                    <div class="card-header mb-3">
                        <h5 class="card-title">@lang('lang.edit_article_title_en')</h5>
                    </div>
                    <div class="mb-3">
                        <label for="titre_en">@lang('lang.article_title_en')</label>
                        <input type="text" name="titre_en" id="titre_en" class="form-control" value="{{ old('titre_en', $article->titre['en'] ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="contenu_en">@lang('lang.article_content_en')</label>
                        <textarea name="contenu_en" id="contenu_en" class="form-control" rows="6">{{ old('contenu_en', $article->contenu['en'] ?? '') }}</textarea>
                    </div>
                    <div class="card-header mb-3">
                        <h5 class="card-title">@lang('lang.edit_article_title_fr')</h5>
                    </div>
                    <div class="mb-3">
                        <label for="titre_fr">@lang('lang.article_title_fr')</label>
                        <input type="text" name="titre_fr" id="titre_fr" class="form-control" value="{{ old('titre_fr', $article->titre['fr'] ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="contenu_fr">@lang('lang.article_content_fr')</label>
                        <textarea name="contenu_fr" id="contenu_fr" class="form-control" rows="6">{{ old('contenu_fr', $article->contenu['fr'] ?? '') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
