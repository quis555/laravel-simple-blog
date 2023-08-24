@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('title', 'Panel administracyjny')

@section('content')
    <h3>Panel administracyjny</h3>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.articles') }}">Artykuły</a>
        </li>
        @if(Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users') }}">Użytkownicy</a>
            </li>
        @endauth
    </ul>
@endsection
