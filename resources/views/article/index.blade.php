@extends('layouts.app')
@section('title')
    @lang('lang.forum_title')
@endsection
@section('content')
<h1 class="my-5 text-center">@lang('Forum')</h1>
<div class="row">
    @forelse ($articles as $article)
    <div class="col-md-6 mb-4">
        <div class="border rounded p-4 h-100 d-flex flex-column justify-content-between">
            <div>

                    <h5 class="text-uppercase">{{ $article->titre ? $article->titre[app()->getLocale()]?? $article->titre['en'] : '' }}</h5>

                <hr>
 
                    <p>{{ $article->contenu ? $article->contenu[app()->getLocale()]?? $article->contenu['en'] : '' }}</p>

            </div>
            <div>
                <small class="text-muted">@lang('Posted by') {{ $article->user->name }} @lang('on') {{ $article->created_at->format('d/m/Y') }}</small>
            </div>
            <div class="mt-2">
                @if(auth()->id() == $article->user_id)
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-secondary">@lang('Edit')</a>
                    <form action="{{ route('article.delete', $article->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                    </form>
    
                @endif
            </div>
        </div>
    </div>
    @empty
        <div class="alert alert-danger">
            @lang('lang.no_articles_text')
        </div>
    @endforelse
</div>


@endsection
