@extends('layouts.app')

@section('title', 'Lista użytkowników')

@section('content')
    <div class="row mt-3">
        <div class="col">
            <h3>Użytkownicy</h3>
        </div>
        <div class="col text-end">
            <a href="/admin/user" class="btn btn-primary">Nowy użytkownik</a>
        </div>
    </div>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>Imię</th>
            <th>Adres e-mail</th>
            <th>Data rejestracji</th>
            <th>Data weryfikacji</th>
            <th>Rola</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->email_verified_at ?? '-' }}</td>
                <td>{{ $user->role === 'admin' ? 'Administrator' : ($user->role === 'editor' ? 'Redaktor' : 'Użytkownik') }}</td>
                <td>
                    <div class="btn-group">
                        <a href="/admin/user/{{$user->id}}" class="btn btn-primary btn-sm">Edytuj</a>
                        <a href="/admin/user/{{$user->id}}/delete" class="btn btn-danger btn-sm">Usuń</a>
                        <a href="/admin/user/{{$user->id}}/activate" class="btn btn-success btn-sm @if($user->email_verified_at) disabled @endif">Aktywuj</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        @if($users->hasPages())
            <tfoot>
            <tr>
                <td colspan="7">
                    {{ $users->links() }}
                </td>
            </tr>
            </tfoot>
        @endif
    </table>
@endsection
