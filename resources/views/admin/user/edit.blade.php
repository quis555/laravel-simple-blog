@extends('layouts.app')

@section('title', isset($user) ? 'Edycja użytkownika' : 'Nowy użytkownik')

@section('content')
    @if(isset($user))
        <h3>Edycja użytkownika</h3>
    @else
        <h3>Nowy użytkownik</h3>
    @endif
    <form method="POST" action="/admin/user{{ isset($user) ? ('/' . $user->id) : '' }}">
        @csrf
        @method(isset($user) ? 'PUT' : 'POST')
        @if(!isset($user))
            <x-forms.input type="email" name="email" label="Adres e-mail" placeholder="Adres e-mail"/>
            <x-forms.input type="password" name="password" label="Hasło" placeholder="Hasło"/>
            <x-forms.input type="password" name="password_confirmation" label="Powtórz hasło"
                           placeholder="Powtórz hasło"/>
        @endif
        <x-forms.input name="name" label="Imię" placeholder="Imię" value="{{ isset($user) ? $user->name : '' }}"/>
        <x-forms.select name="role" label="Rola" :value="isset($user) ? $user->role : 'user'"
                        :options="['user' => 'Użytkownik', 'editor' => 'Redaktor', 'admin' => 'Administrator']"/>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary" value="Zapisz użytkownika"/>
            <a href="/admin/users" class="btn btn-outline-primary">Powrót na listę</a>
        </div>
    </form>
@endsection
