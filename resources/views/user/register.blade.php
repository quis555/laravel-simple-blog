@extends('layouts.app')

@section('title', 'Rejestracja')

@section('content')
    <form method="POST" action="/register">
        @csrf
        <h3>Utwórz konto</h3>
        <x-forms.input name="name" placeholder="Dawid" label="Jak masz na imię?"/>
        <x-forms.input type="email" name="email" placeholder="name@example.com" label="Twój adres e-mail"/>
        <x-forms.input type="password" name="password" placeholder="******" label="Hasło"/>
        <x-forms.input type="password" name="password_confirmation" placeholder="******" label="Powtórz hasło"/>
        <div class="mt-2">
            <input type="submit" class="btn btn-primary" value="Utwórz konto"/>
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Strona główna</a>
        </div>
    </form>
@endsection
