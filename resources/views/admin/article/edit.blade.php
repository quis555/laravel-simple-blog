@extends('layouts.app')

@section('title', isset($article) ? 'Edycja artykułu' : 'Nowy artykuł')

@section('content')
    @if(isset($article))
        <h3>Edycja artykułu</h3>
    @else
        <h3>Nowy artykuł</h3>
    @endif
    <form method="POST" action="/admin/article{{ isset($article) ? ('/' . $article->id) : '' }}"
          enctype="multipart/form-data">
        @csrf
        @method(isset($article) ? 'PUT' : 'POST')
        <x-forms.input name="title" placeholder="Tytuł artykułu" label="Tytuł artykułu"
                       value="{{ isset($article) ? $article->title : '' }}"/>
        <x-forms.textarea name="content" placeholder="Treść artykułu" label="Treść artykułu"
                          value="{{ isset($article) ? $article->content : '' }}"/>
        <x-forms.input type="file" name="img" label="Obrazek wyświetlany przy artykule"
                       info="Najlepiej kwadrat; dozwolone rozszerzenia plików: jpg, jpeg, png, gif, bmp, svg, webp; maksymalny rozmiar: 2 MB"/>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary" value="Zapisz artykuł"/>
            <a href="/admin/articles" class="btn btn-outline-primary">Powrót na listę</a>
        </div>
    </form>
@endsection
