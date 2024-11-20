<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentEmai extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $offerLetter;
    public $bankDetailsLetter;
    public $acceptanceLetter;

    public function __construct($student, $offerLetter, $bankDetailsLetter, $acceptanceLetter)
    {
        $this->student = $student;
        $this->offerLetter = $offerLetter;
        $this->bankDetailsLetter = $bankDetailsLetter;
        $this->acceptanceLetter = $acceptanceLetter;
    }

    public function build()
    {
        return $this->view('emails.admission')
            ->subject('Admission Documents')
            ->attachData($this->offerLetter, 'offer_letter_' . $this->student->first_name . '.pdf')
            ->attachData($this->bankDetailsLetter, 'bank_details_letter_' . $this->student->first_name . '.pdf')
            ->attachData($this->acceptanceLetter, 'acceptance_letter_' . $this->student->first_name . '.pdf');
    }
}
