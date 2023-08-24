<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordQueued extends ResetPassword implements ShouldQueue
{
    use Queueable;

    protected function buildMailMessage($url): MailMessage
    {
        $expireIn = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');
        return (new MailMessage)
            ->greeting('Cześć!')
            ->subject('Zresetuj swoje hasło')
            ->line('Otrzymujesz tego e-maila, ponieważ otrzymaliśmy prośbę o zresetowanie hasła do Twojego konta.')
            ->action('Zresetuj hasło', $url)
            ->line('Link do resetowania hasła wygaśnie w ciągu ' . $expireIn . ' minut.')
            ->line('Jeśli to nie Ty poprosiłeś o zresetowanie hasła, po prostu zignoruj tę wiadomość.')
            ->salutation('Pozdrawiamy, ' . config('app.name'));
    }
}
