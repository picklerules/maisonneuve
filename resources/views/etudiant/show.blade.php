@extends('layouts.app')
@section('title', 'Étudiant')
@section('content')

<div class="container my-5">
    <h1 class="my-5 text-center">Étudiant</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $etudiant->nom }}</h2>
            <p class="card-text"><strong>Adresse :</strong> {{ $etudiant->adresse }}</p>
            <p class="card-text"><strong>Téléphone :</strong> {{ $etudiant->telephone }}</p>
            <p class="card-text"><strong>Email :</strong> {{ $etudiant->email }}</p>
            <p class="card-text"><strong>Date de naissance :</strong> {{ $etudiant->date_naissance }}</p>
            <p class="card-text"><strong>Ville :</strong> {{ $etudiant->ville_id }}</p>
            <!-- Boutons d'action -->
            <a href="" class="btn btn-primary">Mettre à jour</a>
            <form action="" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>

@endsection