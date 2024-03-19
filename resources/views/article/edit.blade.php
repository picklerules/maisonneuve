@extends('layouts.app')
@section('title', 'Modifier un article')
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

<form method="post">
    @csrf 
    @method('PUT')
    <div class="form-group">
        <label for="titre_en">@lang('lang.article_title_en')</label>
        <input type="text" name="titre_en" id="titre_en" class="form-control" value="{{ old('titre_en', $article->titre['en'] ?? '') }}">
    </div>
    <div class="form-group">
        <label for="contenu_en">@lang('lang.article_content_en')</label>
        <textarea name="contenu_en" id="contenu_en" class="form-control">{{ old('contenu_en', $article->contenu['en'] ?? '') }}</textarea>
    </div>
    <div class="form-group">
        <label for="titre_fr">@lang('lang.article_title_fr')</label>
        <input type="text" name="titre_fr" id="titre_fr" class="form-control" value="{{ old('titre_fr', $article->titre['fr'] ?? '') }}">
    </div>
    <div class="form-group">
        <label for="contenu_fr">@lang('lang.article_content_fr')</label>
        <textarea name="contenu_fr" id="contenu_fr" class="form-control">{{ old('contenu_fr', $article->contenu['fr'] ?? '') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">@lang('Update')</button>
</form>

@endsection
