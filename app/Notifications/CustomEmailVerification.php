<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;

class CustomEmailVerification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = route('verification.verify', ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]);

        return (new MailMessage)
                    ->subject('Verificación de tu correo electrónico')
                    ->greeting('Hola ' . $notifiable->name)
                    ->line('Por favor, haz clic en el botón de abajo para verificar tu dirección de correo electrónico.')
                    ->action('Verificar correo electrónico', $url)
                    ->line('Si no creaste una cuenta, no es necesario hacer nada.')
                    ->salutation('¡Gracias por registrarte!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
