<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactMessage extends Mailable
{
    /**
     * @param  array{nom: string, email: string, telephone: ?string, societe: ?string, message: string}  $data
     */
    public function __construct(public array $data) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Site Scribe — nouveau message de '.$this->data['nom'],
            // « Répondre » dans la messagerie écrit directement à la personne qui a rempli le formulaire
            replyTo: [new Address($this->data['email'], $this->data['nom'])],
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'mail.contact');
    }
}
