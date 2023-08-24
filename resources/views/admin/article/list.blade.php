@extends('layouts.app')

@section('title', 'Lista artykułów')

@section('content')
    <div class="row mt-3">
        <div class="col">
            <h3>Artykuły</h3>
        </div>
        <div class="col text-end">
            <a href="/admin/article" class="btn btn-primary">Nowy artykuł</a>
        </div>
    </div>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>Tytuł</th>
            <th>Data utworzenia</th>
            <th>Data ostatniej modyfikacji</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @forelse($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->created_at }}</td>
                <td>{{ $article->updated_at }}</td>
                <td>
                    <div class="btn-group">
                        <a href="/admin/article/{{$article->id}}" class="btn btn-primary btn-sm">Edytuj</a>
                        <a href="/admin/article/{{$article->id}}/delete" class="btn btn-danger btn-sm">Usuń</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Brak artykułów</td>
            </tr>
        @endforelse
        </tbody>
        @if($articles->hasPages())
            <tfoot>
            <tr>
                <td colspan="5">
                    {{ $articles->links() }}
                </td>
            </tr>
            </tfoot>
        @endif
    </table>
@endsection
