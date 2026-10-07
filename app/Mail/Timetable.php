<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Collection;
use Illuminate\Queue\SerializesModels;

class Timetable extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected Collection $timetableEvents,
        protected Carbon $startDate,
        protected Carbon $endDate,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nädala tunniplaan',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.timetable',
            with: [
                'timetableEvents' => $this->timetableEvents,
                'startDate' => $this->startDate,
                'endDate' => $this->endDate,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
