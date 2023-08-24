<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function notice(): RedirectResponse
    {
        return redirect('/')->with(
            'status',
            'Potwierdź swój adres e-mail, poprzez naciśnięcie odnośnika który do Ciebie wysłaliśmy.'
        );
    }

    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        return redirect('/')->with('status', 'Adres e-mail został potwierdzony.');
    }

    public function send(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Na Twój adres e-mail wysłaliśmy link do potwierdzenia konta.');
    }
}
