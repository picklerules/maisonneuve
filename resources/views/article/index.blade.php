@extends('layouts.app')
@section('title', 'Forum')
@section('content')

<h1 class="my-5 text-center">Forum</h1>
<div class="row">
    @forelse ($articles as $article)
    <div class="col-md-6 mb-4">
        <div class="border rounded p-4 h-100 d-flex flex-column justify-content-between">
            <div>
                @foreach ($article->titre as $lang => $titre)
                    <h5 class="text-uppercase">{{ $lang }}: {{ $titre }}</h5>
                @endforeach
                <hr>
                @foreach ($article->contenu as $lang => $contenu)
                    <p>{{ $lang }}: {{ $contenu }}</p>
                @endforeach
            </div>
            <div>
                <small class="text-muted">@lang('Posted by') {{ $article->user->name }} @lang('on') {{ $article->created_at->format('d/m/Y') }}</small>
            </div>
            <div class="mt-2">
                @if(auth()->id() == $article->user_id)
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $article->id }}">
                        Delete
                    </button>

                    </form>
                @endif
            </div>
        </div>
    </div>
    @empty
        <div class="alert alert-danger">
            There are no articles to display.
        </div>
    @endforelse
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">@lang('lang.warning')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.warning_text_article')<strong>
        @foreach ($article->titre as $lang => $titre)
                        <span>{{ strtoupper($lang) }}: {{ $titre }} </span>
                    @endforeach
        </strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
        <form action="" method="post">
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

@endsection
