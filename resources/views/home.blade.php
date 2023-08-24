@extends('layouts.app')

@section('title', 'Strona główna')

@section('content')
    {{$articles->links()}}
    @forelse($articles as $article)
        <article class="row">
            <div class="col">
                <h2>{{$article->title}}</h2>
                <p><i>dodany {{$article->created_at}}</i></p>
                <p>{{$article->content}}</p>
            </div>
            @if($article->img)
                <div class="col text-end">
                    <img class="img-thumbnail rounded" style="max-width: 400px; max-height: 400px"
                         src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->title }}"/>
                </div>
            @endif
        </article>
        <hr/>
    @empty
        <h6>W tym momencie nie mamy żadnych artykułów.</h6>
    @endforelse
    {{$articles->links()}}
@endsection
