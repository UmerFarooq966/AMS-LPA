<?php

namespace App\Http\Controllers;

use App\Mail\DocumentEmail;
use App\Models\Student;
use App\Models\Email;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LetterController extends Controller
{
    private function generatePDF($view, $data)
    {
        $pdf = Pdf::loadView($view, $data)
            ->setPaper('a4')
            ->setOption('margin-top', '20mm')
            ->setOption('margin-bottom', '20mm')
            ->setOption('margin-left', '15mm')
            ->setOption('margin-right', '15mm');

        return $pdf->output(); // Returns the PDF content
    }

    public function generateBankDetailsLetter($studentId)
    {
        $student = Student::with('bank')->findOrFail($studentId);

        $pdfContent = $this->generatePDF('letters.bank-details', [
            'student' => $student,
            'bank' => $student->bank,
        ]);

        return response()->streamDownload(function () use ($pdfContent) {
            echo $pdfContent;
        }, 'bank_details_letter_' . $student->first_name . '.pdf');
    }

    public function generateOfferLetter($studentId)
    {
        $student = Student::with('course', 'bank')->findOrFail($studentId);

        $pdfContent = $this->generatePDF('letters.offer', [
            'student' => $student,
            'course' => $student->course,
        ]);

        return response()->streamDownload(function () use ($pdfContent) {
            echo $pdfContent;
        }, 'offer_letter_' . $student->first_name . '.pdf');
    }

    public function generateAcceptanceLetter($studentId)
    {
        $student = Student::findOrFail($studentId);

        // The URL to access the student's data via the QR code
        $url = route('student.qr.view', ['id' => $student->id]);

        // Generate the QR code as an SVG and encode it as base64
        $qrCodeImage = QrCode::format('svg')->size(200)->generate($url);
        $qrCodePath = 'data:image/svg+xml;base64,' . base64_encode($qrCodeImage);

        // Generate the acceptance letter PDF with the QR code image
        $pdfContent = Pdf::loadView('letters.acceptance', [
            'student' => $student,
            'course' => $student->course,
            'qrCodePath' => $qrCodePath
        ])->output();

        return response()->streamDownload(function () use ($pdfContent) {
            echo $pdfContent;
        }, 'acceptance_letter_' . $student->first_name . '.pdf');
    }


    public function sendAdmissionEmail(Request $request, Student $student)
    {
        $request->validate([
            'email_id' => 'required|exists:emails,id',
        ]);

        $email = Email::findOrFail($request->email_id)->email;

        // Generate PDFs dynamically
        $offerLetterContent = $this->generatePDF('letters.offer', [
            'student' => $student,
            'course' => $student->course,
        ]);

        $bankDetailsLetterContent = $this->generatePDF('letters.bank-details', [
            'student' => $student,
            'course' => $student->course,
        ]);

        $acceptanceLetterContent = $this->generateAcceptanceLetterContent($student);

        // Send Email with PDFs attached dynamically
        Mail::to($email)->send(new DocumentEmail(
            $student,
            $offerLetterContent,
            $bankDetailsLetterContent,
            $acceptanceLetterContent
        ));

        return redirect()->back()->with('success', 'Admission email sent successfully to ' . $email);
    }

    private function generateAcceptanceLetterContent($student)
    {
        // The URL to access the student's data via the QR code
        $url = route('student.qr.view', ['id' => $student->id]);

        // Generate the QR code as an image and encode it as base64
        $qrCodeImage = QrCode::format('svg')->size(200)->generate($url);
        $qrCodePath = 'data:image/svg+xml;base64,' . base64_encode($qrCodeImage);


        // Generate the acceptance letter PDF with the QR code image
        return Pdf::loadView('letters.acceptance', [
            'student' => $student,
            'course' => $student->course,
            'qrCodePath' => $qrCodePath
        ])->output();
    }
}
