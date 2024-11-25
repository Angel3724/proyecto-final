<?php

namespace App\Mail;

use App\Models\Libro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LibroCreadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $libro;
    
    /**
     * Create a new message instance.
     */
    public function __construct(Libro $libro)
    {
        $this->libro = $libro;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo libro creado', // Definimos el asunto
        );
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Nuevo libro creado')
                    ->view('emails.libro-creado'); // Asegúrate de que este archivo exista
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
