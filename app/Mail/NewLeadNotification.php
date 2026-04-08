<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class NewLeadNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Lead $lead)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Nieuwe Scribly aanvraag: {($this->lead->company ?? 'Geen bedrijf')}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-lead',
            with: [
                'lead' => $this->lead,
            ],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('local', $this->lead->inkoopbestand_path)
                ->as('inkoopbestand.' . pathinfo($this->lead->inkoopbestand_path, PATHINFO_EXTENSION)),
            Attachment::fromStorageDisk('local', $this->lead->leverancierbestand_path)
                ->as('leverancierbestand.' . pathinfo($this->lead->leverancierbestand_path, PATHINFO_EXTENSION)),
        ];
    }
}
