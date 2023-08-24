<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function view(): View
    {
        return view('user.register');
    }

    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $user = User::create($request->only(['name', 'email', 'password']));
        event(new Registered($user));
        return redirect('/')->with('status', 'Konto zostało utworzone. Na Twój adres e-mail wysłaliśmy link do potwierdzenia konta.');
    }
}
