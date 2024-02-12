@extends('layouts.app')
@section('title', 'Ajouter un étudiant')
@section('content')

<form action="{{route('etudiant.store')}}" method="post">
    @csrf 
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control">
        @if($errors->has('nom'))
            <div class="text-danger mt-2">{{$errors->first('nom')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="prenom">Adresse</label>
        <input type="text" name="adresse" id="adresse" class="form-control">
        @if($errors->has('adresse'))
            <div class="text-danger mt-2">{{$errors->first('adresse')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" id="telephone" class="form-control">
        @if($errors->has('telephone'))
            <div class="text-danger mt-2">{{$errors->first('telephone')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control">
        @if($errors->has('email'))
            <div class="text-danger mt-2">{{$errors->first('email')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="date_naissance">Date de naissance</label>
        <input type="date" name="date_naissance" id="date_naissance" class="form-control">
        @if($errors->has('date_naissance'))
            <div class="text-danger mt-2">{{$errors->first('date_naissance')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="ville_id">Ville</label>
        <select name="ville_id" id="ville_id" class="form-control">
            <option value="">Sélectionner une ville</option>
                <option value=""></option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>

@endsection