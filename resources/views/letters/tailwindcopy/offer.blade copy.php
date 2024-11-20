@extends('layouts.app')

@section('content')
<div class="font-sans bg-gray-100 p-10">
    <div class="max-w-4xl mx-auto bg-white p-10 shadow-md border border-gray-200">
        <div class="flex justify-between items-start mb-6">
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
        <hr class="border-t border-gray-400 mb-6">
        <div class="mb-6">
            <p class="font-semibold">{{ $student->created_at->format('jS F Y') }}</p>
            <p>Ref: LPA/ {{$student->course_code}}{{ $student->r_id }}</p>
            <p>Re: {{ str_replace(' ', '', $student->first_name) }}{{ $student->last_name }}</p>
        </div>
        <div class="mb-6">
            <h3 class="text-2xl font-bold uppercase text-center underline mb-4">Provisional Offer of Admission</h3>
            <div class="flex flex-row justify-between">
                <p>Dear <b>{{ $student->first_name }} {{ $student->last_name }}</b> </p>
                <p><b> Date of Birth: {{ $student->date_of_birth }}</b></p>
            </div>
        </div>
        <div class="mb-6">
            <p>Thank you for sending your completed application form, which has been carefully considered by our Board of Education Advisors and your subsequent interview.</p>
            <p>You will be pleased to learn that based on the information that you have provided, the board has decided to offer you a place at London Professional Academy.</p>
        </div>
        <div class="mb-6">
            <h4 class="text-lg font-bold mb-4">The details are as follows:</h4>
            <table class="w-full text-sm mb-4">
                <tr>
                    <td class="font-semibold py-2">Course:</td>
                    <td>{{ $course->course_name }}</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2">Qualification:</td>
                    <td>{{ $course->final_qualification }}</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2">Status:</td>
                    <td>{{ $course->status }}</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2">Commencement:</td>
                    <td>{{ \Carbon\Carbon::parse($course->commencement_date)->format('jS F Y') }}</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2">Duration:</td>
                    <td>{{ $course->course_duration }} months</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2">Completion:</td>
                    <td>{{ \Carbon\Carbon::parse($course->completion_date)->format('jS F Y') }}</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2">Payment required:</td>
                    <td>£{{ number_format($course->tuition_fee, 2) }} Tuition Fee + (Registration Fee £{{ number_format($course->registration_fee, 2) }} Non-refundable)</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2">Bank Deposit:</td>
                    <td> 28 days bank deposit required, covering 11 months living expenses plus
                        your tuition fees}</td>
                </tr>
            </table>
        </div>
        <div class="mb-6">
            <p>Please make a Bank transfer or Bank Draft payable to "London Professional Academy".</p>
            <p>Sort Code: 23-05-80, Account Number: 54569785 (for international payments, IBAN: GB12MYMB23058054569785)</p>
        </div>
        <div class="mb-6">
            <p>If you decide to accept this offer, please send the above required payment along with your 28 days bank statement, upon receipt of which we will process your enrolment and forward you an Acceptance letter, Accommodation letter, Visa support documents along with an invoice for your proposed course.</p>
            <p>If you have any queries or require further information concerning this offer, please get in touch with us and we will be happy to advise you.</p>
        </div>
        <div class="mt-10">
            <p>Yours faithfully,</p>
            <img src="https://via.placeholder.com/100x50" alt="Signature" class="my-4">
            <p><strong>Paul Smith</strong></p>
            <p>Director of Admissions</p>
            <p>London Professional Academy</p>
            <p>United Kingdom</p>
        </div>
        <div class="mt-6 text-sm text-gray-500 border-t border-gray-400 pt-4">
            <p>Note: This letter is conditional & not valid for visa application purposes.</p>
        </div>
        <footer class="mt-6 text-xs text-center text-gray-600">
            <p>London Professional Academy (Registered in England and Wales. Company No: 12249241)</p>
            <p>Tel: +44 (0) 203 4111 651 - Email: <a href="mailto:info@londonpro.org.uk" class="text-blue-500">info@londonpro.org.uk</a> - Web: <a href="http://www.londonpro.org.uk" class="text-blue-500">www.londonpro.org.uk</a></p>
        </footer>
    </div>
</div>
@endsection