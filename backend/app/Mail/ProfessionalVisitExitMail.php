<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProfessionalVisitExitMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $pdfs;
    public string $visitorName;

    /**
     * Create a new message instance.
     */
    public function __construct(array $pdfs, string $visitorName)
    {
        $this->pdfs = $pdfs; // ['nombre.pdf' => contenido]
        $this->visitorName = $visitorName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Professional Visit Exit Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.professional_exit',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        foreach ($this->pdfs as $filename => $pdfContent) {
            $attachments[] = Attachment::fromData(fn () => $pdfContent, $filename)
                ->withMime('application/pdf');
        }

        return $attachments;
    }
}
