<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Provisional Offer of Admission</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        .container {
            box-sizing: border-box;
            overflow: hidden;
        }

        h2 {
            font-size: 20px;

        }

        h3,
        h4 {
            text-transform: uppercase;
            margin: 0 0 8px;
            font-size: 14px;
        }

        p {
            margin: 4px 0;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 12px;
        }

        table th,
        table td {
            padding: 4px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        .header-table {
            width: 100%;
            margin-bottom: 10px;
            border-collapse: collapse;
        }

        .header-table td {
            padding: 5px;
            border: none;
        }

        .logo img {
            max-width: 150px;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 10px;
            border-top: 1px solid #e5e7eb;
            padding-top: 5px;
        }

        a {
            color: #3b82f6;
            text-decoration: underline;
        }

        .signature img {
            max-width: 180px;
        }

        .note {
            font-size: 11px;
            color: #6b7280;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <table class="header-table">
            <tr>
                <td class="logo">
                    <img src="{{ public_path('storage/resources/lpa-logo.png') }}" alt="London Professional Academy Logo">
                </td>
                <td>
                    <h3 style="text-align:center">London Professional <br> Academy</h3>
                </td>
                <td style="text-align: right;">
                    <p>Roycraft House</p>
                    <p>15 Linton Road, Barking</p>
                    <p>IG11 8HE, United Kingdom</p>
                </td>
            </tr>
        </table>
        <hr>

        <!-- Reference Section -->
        <p><strong>{{ date('jS F Y', strtotime($student->created_at)) }}</strong></p>
        <p>Ref: LPA/{{ $student->course_code }}{{ $student->r_id }}</p>
        <p>Re: {{ $student->first_name }} {{ $student->last_name }}</p>

        <!-- Title Section -->
        <h2 style="text-align:center">Provisional Offer of Admission</h2>
        <p><strong>Dear {{ $student->first_name }} {{ $student->last_name }}</strong></p>
        <p><strong>Date of Birth: {{ $student->date_of_birth }}</strong></p>

        <!-- Introductory Section -->
        <p>Thank you for sending your completed application form, which has been carefully considered by our Board of Education Advisors and your subsequent interview.</p>
        <p>You will be pleased to learn that based on the information that you have provided, the board has decided to offer you a place at London Professional Academy.</p>

        <!-- Course Details -->
        <h4>The details are as follows:</h4>
        <table>
            <tr>
                <td><strong>Course:</strong></td>
                <td>{{ $course->course_name }}</td>
            </tr>
            <tr>
                <td><strong>Qualification:</strong></td>
                <td>{{ $course->final_qualification }}</td>
            </tr>
            <tr>
                <td><strong>Status:</strong></td>
                <td>{{ $course->status }}</td>
            </tr>
            <tr>
                <td><strong>Commencement:</strong></td>
                <td>{{ date('jS F Y', strtotime($course->commencement_date)) }}</td>
            </tr>
            <tr>
                <td><strong>Duration:</strong></td>
                <td>{{ $course->course_duration }} months</td>
            </tr>
            <tr>
                <td><strong>Completion:</strong></td>
                <td>{{ date('jS F Y', strtotime($course->completion_date)) }}</td>
            </tr>
            <tr>
                <td><strong>Payment Required:</strong></td>
                <td>£{{ number_format($course->tuition_fee, 2) }} Tuition Fee + (Registration Fee £{{ number_format($course->registration_fee, 2) }} Non-refundable)</td>
            </tr>
            <tr>
                <td><strong>Bank Deposit:</strong></td>
                <td>28 days bank deposit required, covering 11 months living expenses plus your tuition fees.</td>
            </tr>
        </table>

        <!-- Payment Information -->
        <p>Please make a Bank transfer or Bank Draft payable to "London Professional Academy".</p>
        <p>Sort Code: 23-05-80, Account Number: 54569785 (for international payments, IBAN: GB12MYMB23058054569785)</p>

        <!-- Acceptance Instructions -->
        <p>If you decide to accept this offer, please send the above required payment along with your 28 days bank statement, upon receipt of which we will process your enrolment and forward you an Acceptance letter, Accommodation letter, Visa support documents along with an invoice for your proposed course.</p>
        <p>If you have any queries or require further information concerning this offer, please get in touch with us and we will be happy to advise you.</p>

        <!-- Signature Section -->
        <div class="signature">
            <p>Yours faithfully,</p>
            <img src="{{ public_path('storage/resources/paul-signature.jpeg') }}" alt="Signature">
            <p><strong>Paul Smith</strong></p>
            <p>Director of Admissions</p>
            <p>London Professional Academy</p>
        </div>

        <!-- Note -->
        <div class="note">
            <p>Note: This letter is conditional & not valid for visa application purposes.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>London Professional Academy (Registered in England and Wales. Company No: 12249241)</p>
            <p>Tel: +44 (0) 203 4111 651 - Email: <a href="mailto:info@londonpro.org.uk">info@londonpro.org.uk</a></p>
            <p>Web: <a href="http://www.londonpro.org.uk">www.londonpro.org.uk</a></p>
        </div>
    </div>
</body>

</html>