@php use Illuminate\Support\Facades\Auth; @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog - @yield('title')</title>

    @section('styles')
        <link href="/css/normalize.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
              crossorigin="anonymous">
    @show
</head>
<body>
<div class="container">
    <div class="row mt-1">
        <div class="col">
            <h1><a href="/" style="text-decoration: none; color: black;">Prosty blog</a></h1>
        </div>
        <div class="col text-end">
            @auth
                <span class="me-2">Witaj {{ Auth::user()->name }}!</span>
                <a href="{{ route('logout') }}">Wyloguj się</a><br/>
                @if(!Auth::user()->hasVerifiedEmail())
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <span class="text-danger">Twój adres e-mail nie został potwierdzony.</span>
                        <input type="submit" class="btn btn-primary btn-sm" value="Ponów"/>
                    </form>
                @endif
                @if (Auth::user()->hasVerifiedEmail() && Auth::user()->hasRole('editor'))
                    <a href="/admin">Panel administracyjny</a>
                @endif
            @endauth
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Logowanie</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Rejestracja</a>
            @endguest
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @section('content')
    @show
</div>
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>
@show
</body>
</html>
