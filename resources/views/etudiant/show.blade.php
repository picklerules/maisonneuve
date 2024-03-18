@extends('layouts.app')
@section('title', 'Étudiant')
@section('content')

<div class="container my-5">
    <h1 class="my-5 text-center">@lang('Student')</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $etudiant->user->name }}</h2>
            <p class="card-text"><strong>@lang('Address') :</strong> {{ $etudiant->adresse }}</p>
            <p class="card-text"><strong>@lang('City') :</strong> {{ $etudiant->ville->nom }}</p>
            <p class="card-text"><strong>@lang('Phone') :</strong> {{ $etudiant->telephone }}</p>
            <p class="card-text"><strong>@lang('Date of birth') :</strong> {{ $etudiant->date_naissance }}</p>
            <p class="card-text"><strong>@lang('Email') :</strong> {{ $etudiant->user->email }}</p>
            <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-primary">@lang('Update')</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                @lang('Delete')
            </button>
        </div>
    </div>
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
        @lang('lang.warning_text')<strong>{{ $etudiant->user->name }}</strong>?
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