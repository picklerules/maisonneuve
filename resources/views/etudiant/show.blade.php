@extends('layouts.app')
@section('title', 'Étudiant')
@section('content')

<div class="container my-5">
    <h1 class="my-5 text-center">Étudiant</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $etudiant->user->name }}</h2>
            <p class="card-text"><strong>Adresse :</strong> {{ $etudiant->adresse }}</p>
            <p class="card-text"><strong>Téléphone :</strong> {{ $etudiant->telephone }}</p>
            <p class="card-text"><strong>Email :</strong> {{ $etudiant->user->email }}</p>
            <p class="card-text"><strong>Date de naissance :</strong> {{ $etudiant->date_naissance }}</p>
            <p class="card-text"><strong>Ville :</strong> {{ $etudiant->ville->nom }}</p>
            <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-primary">Mettre à jour</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Supprimer
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Attention</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer l'étudiant <strong>{{ $etudiant->nom }}</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form action="" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
            Supprimer
            </button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection