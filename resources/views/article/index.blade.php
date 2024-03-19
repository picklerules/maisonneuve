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
        </div>
    </div>
    @empty
        <div class="alert alert-danger">
            There are no articles to display.
        </div>
    @endforelse
</div>

@endsection
