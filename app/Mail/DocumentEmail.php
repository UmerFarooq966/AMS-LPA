<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentEmail extends Mailable
{

    use Queueable, SerializesModels;

    public $student;
    public $offerLetter;
    public $bankDetailsLetter;
    public $acceptanceLetter;

    /**
     * Create a new message instance.
     */
    public function __construct($student, $offerLetter, $bankDetailsLetter, $acceptanceLetter)
    {
        $this->student = $student;
        $this->offerLetter = $offerLetter;
        $this->bankDetailsLetter = $bankDetailsLetter;
        $this->acceptanceLetter = $acceptanceLetter;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admission Documents',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admission',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn() => $this->offerLetter, 'offer_letter_' . $this->student->first_name . '.pdf')
                ->withMime('application/pdf'),
            Attachment::fromData(fn() => $this->bankDetailsLetter, 'bank_details_letter_' . $this->student->first_name . '.pdf')
                ->withMime('application/pdf'),
            Attachment::fromData(fn() => $this->acceptanceLetter, 'acceptance_letter_' . $this->student->first_name . '.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
