@extends('layouts.app')
@section('title')
    @lang('lang.create_article_title')
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
<h2 class="text-center mt-4 mb-4 p-3 shadow rounded bg-light">@lang('lang.create_article_title')</h2>
<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('article.store') }}" method="POST">
                    @csrf
                    <div class="card-header mb-3">
                        <h5 class="card-title">@lang('lang.add_article_title_en')</h5>
                    </div>
                    <div class="mb-3">
                        <label for="titre_en" class="form-label">@lang('lang.article_title_en')</label>
                        <input type="text" class="form-control" id="titre_en" name="titre_en" value="{{ old('titre_en') }}">
                    </div>
                    <div class="mb-3">
                        <label for="contenu_en" class="form-label">@lang('lang.article_content_en')</label>
                        <textarea class="form-control" id="contenu_en" name="contenu_en">{{ old('contenu_en') }}</textarea>
                    </div>
                    <div class="card-header mb-3">
                        <h5 class="card-title">@lang('lang.add_article_title_fr')</h5>
                    </div>
                    <div class="mb-3">
                        <label for="titre_fr" class="form-label">@lang('lang.article_title_fr')</label>
                        <input type="text" class="form-control" id="titre_fr" name="titre_fr" value="{{ old('titre_fr') }}">
                    </div>
                    <div class="mb-3">
                        <label for="contenu_fr" class="form-label">@lang('lang.article_content_fr')</label>
                        <textarea class="form-control" id="contenu_fr" name="contenu_fr">{{ old('contenu_fr') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('Publish')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
