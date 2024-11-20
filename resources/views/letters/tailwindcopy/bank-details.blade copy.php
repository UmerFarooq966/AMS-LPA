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
            <p class="font-semibold">{{ now()->format('jS F Y') }}</p>
            <p>Ref: LPA/ {{$student->course_code}}{{ $student->r_id }}</p>
            <p>Re: {{ str_replace(' ', '', $student->first_name) }}{{ $student->last_name }}</p>
        </div>
        <div class="mb-6">
            <h3 class="text-2xl font-bold uppercase text-center mb-4">Online Payment Information</h3>
            <p>Transfer the money directly from your bank to our account. Please ensure your relevant student ID or student admission reference number is quoted as reference for the payment.</p>
        </div>
        <div class="mb-6">
            <h4 class="text-lg font-bold mb-4">Student Details</h4>
            <table class="w-full text-sm mb-4 border border-gray-300 table-fixed">
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Student Name:</td>
                    <td class="py-2 px-4 w-1/2">{{ $student->first_name }} {{ $student->last_name }}</td>
                </tr>
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Date of Birth:</td>
                    <td class="py-2 px-4 w-1/2">{{ $student->date_of_birth }}</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Student Admission Reference:</td>
                    <td class="py-2 px-4 w-1/2">LPA/{{ $student->r_id }}</td>
                </tr>
            </table>
        </div>
        <div class="mb-6">
            <h4 class="text-lg font-bold mb-4">Bank Details</h4>
            <table class="w-full text-sm mb-4 border border-gray-300 table-fixed">
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Bank Name:</td>
                    <td class="py-2 px-4 w-1/2">Metro Bank</td>
                </tr>
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Account Name:</td>
                    <td class="py-2 px-4 w-1/2">London Professional Academy Limited</td>
                </tr>
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Branch Address:</td>
                    <td class="py-2 px-4 w-1/2">114 High Road, Ilford, IG1 1BY, United Kingdom</td>
                </tr>
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Bank Head Office Address:</td>
                    <td class="py-2 px-4 w-1/2">1 Southampton Row, London, WC1B 5HA, United Kingdom</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Contact:</td>
                    <td class="py-2 px-4 w-1/2">+44 (0) 345 0808 500</td>
                </tr>
            </table>
        </div>
        <div class="mb-6">
            <h4 class="text-lg font-bold mb-4">Account Details</h4>
            <table class="w-full text-sm mb-4 border border-gray-300 table-fixed">
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Sort Code:</td>
                    <td class="py-2 px-4 w-1/2">23-05-80</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">Account Number:</td>
                    <td class="py-2 px-4 w-1/2">54569785</td>
                </tr>
            </table>
        </div>
        <div class="mb-6">
            <h4 class="text-lg font-bold mb-4">Account Details for International Payments</h4>
            <table class="w-full text-sm mb-4 border border-gray-300 table-fixed">
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">SWIFT:</td>
                    <td class="py-2 px-4 w-1/2">MYMBGB2L</td>
                </tr>
                <tr class="border-b">
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">IBAN:</td>
                    <td class="py-2 px-4 w-1/2">GB12MYMB23058054569785</td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 px-4 bg-gray-100 w-1/2">BIC:</td>
                    <td class="py-2 px-4 w-1/2">MYMBGB2LXXX</td>
                </tr>
            </table>
        </div>
        <footer class="mt-6 text-xs text-center text-gray-600">
            <p>London Professional Academy (Registered in England and Wales. Company No: 12249241)</p>
            <p>Tel: +44 (0) 203 4111 651 - Email: <a href="mailto:info@londonpro.org.uk" class="text-blue-500">info@londonpro.org.uk</a> - Web: <a href="http://www.londonpro.org.uk" class="text-blue-500">www.londonpro.org.uk</a></p>
        </footer>
    </div>
</div>
@endsection