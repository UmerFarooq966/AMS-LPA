@extends('layouts.app')

@section('content')
<div class="font-sans bg-gray-100 p-6">
    <div class="max-w-a4 mx-auto bg-white p-8 shadow-lg border border-gray-300" style="width: 210mm; min-height: 297mm;">
        <div class="flex justify-between items-start mb-4">
            <div class="flex flex-row">
                <img src="https://via.placeholder.com/150" alt="London Professional Academy Logo" class="w-32 mb-4">
                <h2 class="pl-6 pt-6 text-xl font-bold uppercase">London <br> Professional <br> Academy</h2>
            </div>
            <div class="text-right">
                <p>Roycraft House</p>
                <p>15 Linton Road, Barking</p>
                <p>IG11 8HE, United Kingdom</p>
            </div>
        </div>
        <hr class="border-t-2 border-gray-600 mb-4">
        <div class="flex justify-between mb-4">
            <div>
                <p class="font-semibold text-sm">{{ now()->format('jS F Y') }}</p>
                <p>{{$student->embassy}}</p>
            </div>
        </div>
        <div class="mb-4">
            <h3 class="text-2xl font-bold uppercase text-center mb-4">Course Acceptance Letter</h3>
            <p class="mb-2">Dear Entry Clearance Officer,</p>
            <p>I write to confirm that the below-mentioned student has met the criteria for and has been accepted for the course of study at our institute. Please find the details for the student below:</p>
        </div>
        <div class="mb-4">
            <h4 class="text-lg font-bold mb-2">Student Details</h4>
            <table class="w-full text-xs mb-4 border-collapse border border-gray-400">
                <tbody>
                    <tr class="border-b border-gray-400">
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Application Ref:</td>
                        <td class="p-2">LPA/{{ $student->r_id }}</td>
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Gender:</td>
                        <td class="p-2">{{ $student->gender }}</td>
                    </tr>
                    <tr class="border-b border-gray-400">
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Student Name:</td>
                        <td class="p-2">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Date of Birth:</td>
                        <td class="p-2">{{ $student->date_of_birth }}</td>
                    </tr>
                    <tr class="border-b border-gray-400">
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Passport No.:</td>
                        <td class="p-2">{{ $student->passport_number }}</td>
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Nationality:</td>
                        <td class="p-2">{{ $student->nationality }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-4">
            <h4 class="text-lg font-bold mb-2">Course Details</h4>
            <table class="w-full text-xs mb-4 border-collapse border border-gray-400">
                <tbody>
                    <tr class="border-b border-gray-400">
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Course:</td>
                        <td class="p-2">{{ $course->course_name }}</td>
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Study Level:</td>
                        <td class="p-2">Level 2 Certification</td>
                    </tr>
                    <tr class="border-b border-gray-400">
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Qualification:</td>
                        <td class="p-2">{{ $course->final_qualification }}</td>
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Course Type:</td>
                        <td class="p-2">Full Time</td>
                    </tr>
                    <tr class="border-b border-gray-400">
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Commencement:</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($course->commencement_date)->format('jS F Y') }}</td>
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Completion:</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($course->completion_date)->format('jS F Y') }}</td>
                    </tr>
                    <tr class="border-b border-gray-400">
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Tuition Fee:</td>
                        <td class="p-2">£{{ number_format($course->tuition_fee, 2) }} (Paid)</td>
                        <td class="font-semibold p-2 bg-gray-100 w-1/3">Registration:</td>
                        <td class="p-2">£{{ number_format($course->registration_fee, 2) }} (Paid)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-4 leading-relaxed text-xs">
            <p>The student has paid their full course fees in advance. I would be grateful for any assistance you can provide this student to enable them to process a visa to enter the United Kingdom to commence their course of studies.</p>
            <p class="mt-2">For information on short-term study visas, refer to the link: <a href="https://www.gov.uk/visa-to-study-english" class="text-blue-600 underline">https://www.gov.uk/visa-to-study-english</a></p>
            <p class="mt-2">Should you require any further information regarding the student's forthcoming studies, please do not hesitate to contact us.</p>
        </div>
        <div class="mt-6 flex justify-between items-start text-xs">
            <div>
                <p>Yours faithfully,</p>
                <img src="https://via.placeholder.com/80x40" alt="Signature" class="my-2">
                <p><strong>Paul Smith</strong></p>
                <p>Director of Admissions</p>
                <p>London Professional Academy</p>
            </div>
            <div>
                <img src="https://via.placeholder.com/80x80" alt="QR Code" class="my-2">
            </div>
        </div>
        <footer class="mt-6 text-xs text-center text-gray-600">
            <p>London Professional Academy (Registered in England and Wales. Company No: 12249241)</p>
            <p>Tel: +44 (0) 203 4111 651 - Email: <a href="mailto:info@londonpro.org.uk" class="text-blue-600 underline">info@londonpro.org.uk</a> - Web: <a href="http://www.londonpro.org.uk" class="text-blue-600 underline">www.londonpro.org.uk</a></p>
        </footer>
    </div>
</div>
@endsection