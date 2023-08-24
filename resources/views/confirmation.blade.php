@extends('layouts.app')

@section('title', $title)

@section('content')
    <h3>{{ $title }}</h3>
    <p>{{ $question }}</p>
    <form method="POST" action="{{ $path ?? url()->current() }}">
        @csrf
        @method($method ?? 'POST')
        <input type="submit" value="{{ $yesLabel ?? 'Tak' }}" class="btn btn-{{ $color ?? 'primary' }}"/>
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">{{ $noLabel ?? 'Anuluj' }}</a>
    </form>
@endsection
