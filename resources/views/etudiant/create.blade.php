@extends('layouts.app')
@section('title')
    @lang('lang.create_student_title')
@endsection
@section('content')

<form action="{{route('etudiant.store')}}" method="post">
    @csrf 
    <div class="form-group">
        <label for="name">@lang('Name')</label>
        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
        @if($errors->has('name'))
            <div class="text-danger mt-2">{{$errors->first('name')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="prenom">@lang('Address')</label>
        <input type="text" name="adresse" id="adresse" class="form-control" value="{{old('adresse')}}">
        @if($errors->has('adresse'))
            <div class="text-danger mt-2">{{$errors->first('adresse')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="ville_id">@lang('City')</label>
        <select name="ville_id" id="ville_id" class="form-select">
        <option value="">@lang('Select a city')</option>
            @foreach($villes as $ville)
                <option value="{{ $ville->id }}" {{ old('ville_id') == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="telephone">@lang('Phone')</label>
        <input type="text" name="telephone" id="telephone" class="form-control" value="{{old('telephone')}}">
        @if($errors->has('telephone'))
            <div class="text-danger mt-2">{{$errors->first('telephone')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="date_naissance">@lang('Date of birth')</label>
        <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="{{old('date_naissance')}}">
        @if($errors->has('date_naissance'))
            <div class="text-danger mt-2">{{$errors->first('date_naissance')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="email">@lang('Email')</label>
        <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
        @if($errors->has('email'))
            <div class="text-danger mt-2">{{$errors->first('email')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="password">@lang('Password')</label>
        <input type="password" name="password" id="password" class="form-control" required>
        @if($errors->has('password'))
            <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
        @endif
    </div>


    
    <button type="submit" class="btn btn-primary">@lang('Submit')</button>
</form>

@endsection