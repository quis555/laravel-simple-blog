<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin/user/list', [
            'users' => User::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function activateConfirmation(int $id): View
    {
        $user = User::findOrFail($id);
        return $this->confirm(
            'Czy na pewno chcesz ręcznie aktywować konto użytkownika ' . $user->email . '?',
            'Potwierdź aktywację konta użytkownika',
            [
                'yesLabel' => 'Tak, aktywuj',
                'color' => 'success'
            ]
        );
    }

    public function deleteConfirmation(int $id): View
    {
        $user = User::findOrFail($id);
        return $this->confirmDelete(
            'Czy na pewno chcesz usunąć użytkownika ' . $user->email . '?',
            'Potwierdź usunięcie użytkownika'
        );
    }

    public function activate(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->save();
        return redirect('/admin/users')->with('status', 'Użytkownik został aktywowany.');
    }

    public function delete(int $id): RedirectResponse
    {
        User::findOrFail($id)->delete();
        return redirect('/admin/users')->with('status', 'Użytkownik został usunięty.');
    }

    public function edit(?int $id = null): View
    {
        return view('admin/user/edit', [
            'user' => $id ? User::findOrFail($id) : null,
        ]);
    }

    public function update(UpdateUserRequest $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->name = $request->validated('name');
        $user->role = $request->validated('role');
        $user->save();
        return redirect(url()->previous())->with('status', 'Zapisano zmiany.');
    }

    public function create(CreateUserRequest $request): RedirectResponse
    {
        User::create($request->only(['name', 'email', 'password', 'role']));
        return redirect('/admin/users')->with('status', 'Użytkownik został utworzony.');
    }
}
