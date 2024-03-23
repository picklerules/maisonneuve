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
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $article->id }}">
                                @lang('Delete')
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="deleteModal-{{ $article->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">@lang('lang.warning')</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @lang('lang.warning_article_delete')<strong>{{ $article->titre[app()->getLocale()] ?? $article->titre['en'] }}</strong> ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
            <form action="{{ route('article.delete', $article->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                @lang('Delete')
                </button>
            </form>
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
