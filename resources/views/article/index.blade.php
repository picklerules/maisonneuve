@extends('layouts.app')
@section('title')
    @lang('lang.forum_title')
@endsection
@section('content')
<div class="container mt-5">
    <h2 class="text-center mt-4 mb-4 p-3 shadow rounded bg-light">@lang('lang.forum_title')</h2>
    <div class="text-center mt-4 mb-5">
    <h4 class="mb-3 text-primary">@lang('lang.welcome_forum_text')</h4>
        <a href="{{ route('article.create') }}" class="btn btn-outline-primary">@lang('lang.publish_article')</a>
    </div> 
    @forelse ($articles as $article)
    <div class="col-md-12 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $article->titre[app()->getLocale()] ?? $article->titre['en'] }}</h5>
                <p class="card-text">{{ $article->contenu[app()->getLocale()] ?? $article->contenu['en'] }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">@lang('Posted by') {{ $article->user->name }} @lang('on') {{ $article->created_at->format('d/m/Y') }}</small>
                    @if(auth()->id() == $article->user_id)
                        <div>
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-secondary">@lang('Edit')</a>
                            <form action="{{ route('article.delete', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-warning" role="alert">
        @lang('lang.no_articles_text')
    </div>
    @endforelse
</div>
@endsection
