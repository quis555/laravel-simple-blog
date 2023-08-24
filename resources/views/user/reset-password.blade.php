@extends('layouts.app')

@section('title', 'Zresetuj hasło')

@section('content')
    <form method="POST" action="/reset-password">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}" />
        <h3>Zresetuj hasło</h3>
        <x-forms.input type="email" name="email" placeholder="name@example.com" label="Adres e-mail"/>
        <x-forms.input type="password" name="password" placeholder="******" label="Hasło"/>
        <x-forms.input type="password" name="password_confirmation" placeholder="******" label="Powtórz hasło"/>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary" value="Zmień hasło"/>
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Strona główna</a>
        </div>
    </form>
@endsection
