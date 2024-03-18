@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('content')

@forelse ($etudiants as $etudiant)


<div class="container my-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h4 class="card-title"><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->user->name }}</a></h4>
                    <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-primary">Mettre à jour</a>
                </div>
            </div>
        </div>
    </div>
</div>

@empty
    <div class="alert alert-danger">
        Aucun étudiant.
    </div>
@endforelse

@endsection