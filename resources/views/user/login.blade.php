@extends('layouts.app')

@section('title', 'Logowanie')

@section('content')
    <form method="POST" action="/login">
        @csrf
        <h3>Logowanie</h3>
        <x-forms.input type="email" name="email" placeholder="name@example.com" label="Adres e-mail" />
        <x-forms.input type="password" name="password" placeholder="******" label="Hasło" />
        <x-forms.checkbox name="remember_me" label="Zapamiętaj mnie"/>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary" value="Zaloguj"/>
            <a href="{{ route('password.request') }}" class="btn btn-outline-primary">Nie pamiętam hasła</a>
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Strona główna</a>
        </div>
    </form>
@endsection
