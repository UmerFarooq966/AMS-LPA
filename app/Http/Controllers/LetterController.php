<?php

namespace App\Http\Controllers;

use App\Mail\DocumentEmail;
use App\Models\Student;
use App\Models\Email;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LetterController extends Controller
{
    private function generatePDF($view, $data)
    {
        $html = view($view, $data)->render();

        return Browsershot::html($html)
            //   ->format('A4')
            // ->margins(20, 15, 20, 15)
            ->pdf();
    }

    public function generateBankDetailsLetter($studentId)
    {
        $student = Student::with('bank')->findOrFail($studentId);

        $pdfContent = $this->generatePDF('letters.bank-details', [
            'student' => $student,
            'bank' => $student->bank,
        ]);

        return response()->streamDownload(fn() => print($pdfContent), 'bank_details_letter_' . $student->first_name . '.pdf');
    }

    public function generateOfferLetter($studentId)
    {
        $student = Student::with('course', 'bank')->findOrFail($studentId);

        $pdfContent = $this->generatePDF('letters.offer', [
            'student' => $student,
            'course' => $student->course,
        ]);

        return response()->streamDownload(fn() => print($pdfContent), 'offer_letter_' . $student->first_name . '.pdf');
    }

    public function generateAcceptanceLetter($studentId)
    {
        $student = Student::findOrFail($studentId);
        $url = route('student.qr.view', ['id' => $student->id]);
        $qrCodeImage = QrCode::format('svg')->size(200)->generate($url);
        $qrCodePath = 'data:image/svg+xml;base64,' . base64_encode($qrCodeImage);

        $pdfContent = $this->generatePDF('letters.acceptance', [
            'student' => $student,
            'course' => $student->course,
            'qrCodePath' => $qrCodePath
        ]);

        return response()->streamDownload(fn() => print($pdfContent), 'acceptance_letter_' . $student->first_name . '.pdf');
    }

    public function sendAdmissionEmail(Request $request, Student $student)
    {
        $request->validate(['email_id' => 'required|exists:emails,id']);
        $email = Email::findOrFail($request->email_id)->email;

        $offerLetterContent = $this->generatePDF('letters.offer', [
            'student' => $student,
            'course' => $student->course,
        ]);

        $bankDetailsLetterContent = $this->generatePDF('letters.bank-details', [
            'student' => $student,
            'course' => $student->course,
        ]);

        $acceptanceLetterContent = $this->generateAcceptanceLetterContent($student);

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
        $url = route('student.qr.view', ['id' => $student->id]);
        $qrCodeImage = QrCode::format('svg')->size(200)->generate($url);
        $qrCodePath = 'data:image/svg+xml;base64,' . base64_encode($qrCodeImage);

        return $this->generatePDF('letters.acceptance', [
            'student' => $student,
            'course' => $student->course,
            'qrCodePath' => $qrCodePath
        ]);
    }
}
