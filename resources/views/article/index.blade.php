@extends('layouts.app')
@section('title', 'Forum')
@section('content')

<h1 class="my-5">Forum</h1>
<div class="row">
    @forelse ($articles as $article)
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">
                    @foreach ($article->titre as $lang => $titre)
                        <span>{{ strtoupper($lang) }}: {{ $titre }}</span><br>
                    @endforeach
                </h5>
            </div>
            <div class="card-body">
                @foreach ($article->contenu as $lang => $contenu)
                    <p>{{ strtoupper($lang) }}: {{ $contenu }}</p>
                @endforeach
            </div>
            <div class="card-footer">
                @if(auth()->id() == $article->user_id)
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('article.delete', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            @lang('Delete')
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
