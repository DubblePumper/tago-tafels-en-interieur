<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TagoQuoteRequestMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public array $submission,
        public ?string $attachmentPath = null,
        public ?string $attachmentName = null,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nieuwe aanvraag via Tago website',
            replyTo: [new Address($this->submission['email'], $this->submission['name'])],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.quote-request',
        );
    }

    public function attachments(): array
    {
        if (! $this->attachmentPath) {
            return [];
        }

        return [
            Attachment::fromStorageDisk('local', $this->attachmentPath)
                ->as($this->attachmentName ?? 'tago-aanvraag-bijlage'),
        ];
    }
}
