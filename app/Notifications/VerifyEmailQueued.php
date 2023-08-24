<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailQueued extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    protected function buildMailMessage($url): MailMessage
    {
        return (new MailMessage)
            ->greeting('Cześć!')
            ->subject('Potwierdź adres e-mail')
            ->line('Naciśnij przycisk poniżej, aby potwierdzić swój adres e-mail')
            ->action('Potwierdź adres e-mail', $url)
            ->salutation('Pozdrawiamy, ' . config('app.name'));
    }
}
