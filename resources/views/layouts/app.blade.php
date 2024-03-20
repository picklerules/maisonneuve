<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0f52bb4695.js" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    @php $locale = session()->get('locale')  @endphp
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-house fa-lg" style="color: #2c6ddd;"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link text-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('Forum')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('article.index') }}">@lang('View articles')</a></li>
                        <li><a class="dropdown-item" href="{{ route('article.create')}}">@lang('Publish')</a></li>
                    </ul>
                </li>      
                <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('Repertory')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('file.index') }}">@lang('View files')</a></li>
                        <li><a class="dropdown-item" href="{{ route('file.create')}}">@lang('Upload files')</a></li>
                    </ul>
                </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link text-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('Students')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('etudiant.index') }}">@lang('Students list')</a></li>
                        <li><a class="dropdown-item" href="{{ route('etudiant.create')}}">@lang('Add student')</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">@lang('Language') {{ $locale == '' ? '' : "($locale)" }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">@lang('English')</a></li>
                        <li><a class="dropdown-item" href="{{ route('lang', 'fr') }}">@lang('French')</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                @guest
                        <a href="{{ route('login') }}" class="nav-link">@lang('Login')</a>
                    @else
                        <a href="{{ route('logout') }}" class="nav-link">@lang('Logout')</a>
                    @endguest
                </li>
  
            </ul>
        </div>
    </div>
    </nav>
    </header>

    <main class="flex-grow-1">
    <div class="container">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{session('success')}}
        </div>
        @endif
        @yield('content')
    </div>
    </main>
    
    <footer class="bg-light text-center py-3 mt-auto">
        <div class="p-3">
            &copy; PickleRules {{ date('Y') }} {{ config('app.name') }}
        </div>
    </footer>

</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>