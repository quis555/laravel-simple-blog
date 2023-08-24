@extends('layouts.app')

@section('title', 'Przypomnij hasło')

@section('content')
    <form method="POST" action="{{ url()->current() }}">
        @csrf
        <h3>Przypomnij hasło</h3>
        <x-forms.input type="email" name="email" placeholder="name@example.com" label="Podaj swój adres e-mail"/>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary" value="Wyślij"/>
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Strona główna</a>
        </div>
    </form>
@endsection
