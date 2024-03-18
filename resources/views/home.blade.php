@extends('layouts.app')
@section('title', 'Home page')
@section('content')

<body>

<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">@lang('lang.text_welcome_title')</h1>
        <p class="lead">@lang('lang.text_welcome_description')</p>
        <hr class="my-4">
        <p>@lang('lang.text_welcome_paragraph')</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">@lang('lang.text_welcome_button')</a>
    </div>
</div>




@endsection