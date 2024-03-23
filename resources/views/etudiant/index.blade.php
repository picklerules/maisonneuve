@extends('layouts.app')
@section('title')
    @lang('lang.student_list_title')
@endsection
@section('content')
<h2 class="text-center mt-4 mb-4 p-3 shadow rounded bg-light">@lang('Students list')</h2>
@forelse ($etudiants as $etudiant)
<div class="container my-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h4 class="card-title"><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->user->name }}</a></h4>
                    <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-primary">@lang('Update')</a>
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