<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Acceptance Letter</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        .container {

            min-height: 297mm;
            background: #fff;
            box-sizing: border-box;
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
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table th,
        table td {
            padding: 8px;
            font-size: 12px;
            border: 1px solid #e5e7eb;
        }

        .header-table,
        .footer-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .header-table td,
        .footer-table td {
            border: none;
            padding: 5px;
        }

        .logo img {
            max-width: 150px;
        }

        .logo-text {
            font-size: 14px;
            text-transform: uppercase;
            line-height: 1.4;
        }

        .address {
            text-align: right;
            font-size: 12px;
            line-height: 1.4;
        }

        a {
            color: #3b82f6;
            text-decoration: underline;
        }

        .signature img {
            max-width: 180px;

        }

        .qr img {
            max-width: 80px;
        }

        .signature,
        .qr {
            text-align: center;
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
                <td class="logo-text" style="text-align:center">
                    <b> London Professional <br>
                        Academy</b>
                </td>
                <td class="address">
                    <p>Roycraft House</p>
                    <p>15 Linton Road, Barking</p>
                    <p>IG11 8HE, United Kingdom</p>
                </td>
            </tr>
        </table>
        <hr>

        <!-- Date and Embassy Section -->
        <p><strong>{{ date('jS F Y') }}</strong></p>
        <p>{{ $student->embassy }}</p>

        <!-- Title Section -->
        <h2 style="text-align:center">Course Acceptance Letter</h2>
        <p>Dear Entry Clearance Officer,</p>
        <p>I write to confirm that the below-mentioned student has met the criteria for and has been accepted for the course of study at our institute. Please find the details for the student below:</p>

        <!-- Student Details -->
        <h4>Student Details</h4>
        <table>
            <tr>
                <td><strong>Application Ref:</strong></td>
                <td>Ref: LPA/{{ $student->course_code }}{{ $student->r_id }} </td>
                <td><strong>Gender:</strong></td>
                <td>{{ $student->gender }}</td>
            </tr>
            <tr>
                <td><strong>Student Name:</strong></td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td><strong>Date of Birth:</strong></td>
                <td>{{ $student->date_of_birth }}</td>
            </tr>
            <tr>
                <td><strong>Passport No.:</strong></td>
                <td>{{ $student->passport_number }}</td>
                <td><strong>Nationality:</strong></td>
                <td>{{ $student->nationality }}</td>
            </tr>
        </table>

        <!-- Course Details -->
        <h4>Course Details</h4>
        <table>
            <tr>
                <td><strong>Course:</strong></td>
                <td>{{ $course->course_name }}</td>
                <td><strong>Study Level:</strong></td>
                <td>Level 2 Certification</td>
            </tr>
            <tr>
                <td><strong>Qualification:</strong></td>
                <td>{{ $course->final_qualification }}</td>
                <td><strong>Course Type:</strong></td>
                <td>Full Time</td>
            </tr>
            <tr>
                <td><strong>Commencement:</strong></td>
                <td>{{ date('jS F Y', strtotime($course->course_completion_date)) }}</td>
                <td><strong>Completion:</strong></td>
                <td>{{ date('jS F Y', strtotime($course->course_completion_date)) }}</td>
            </tr>
            <tr>
                <td><strong>Tuition Fee:</strong></td>
                <td>£{{ number_format($course->tuition_fee, 2) }} (Paid)</td>
                <td><strong>Registration:</strong></td>
                <td>£{{ number_format($course->registration_fee, 2) }} (Paid)</td>
            </tr>
        </table>

        <!-- Closing Section -->
        <p>The student has paid their full course fees in advance. I would be grateful for any assistance you can provide this student to enable them to process a visa to enter the United Kingdom to commence their course of studies.</p>
        <p>For information on short-term study visas, refer to the link: <a href="https://www.gov.uk/visa-to-study-english">https://www.gov.uk/visa-to-study-english</a></p>
        <p>Should you require any further information regarding the student's forthcoming studies, please do not hesitate to contact us.</p>

        <!-- Signature and QR Section -->
        <table class="header-table">
            <tr>
                <td class="signature">
                    <p>Yours faithfully,</p>
                    <img src="{{ public_path('storage/resources/paul-signature.jpeg') }}" alt="Signature">
                    <p><strong>Paul Smith</strong></p>
                    <p>Director of Admissions</p>
                    <p>London Professional Academy</p>
                </td>
                <td class="qr">
                    <img src="{{ $qrCodePath }}" alt="QR Code">
                </td>


            </tr>
        </table>
        <hr>
        <!-- Footer Section -->
        <table class="footer-table">
            <tr>
                <td style="text-align: center;">
                    <p>London Professional Academy (Registered in England and Wales. Company No: 12249241)</p>
                    <p>Tel: +44 (0) 203 4111 651 - Email: <a href="mailto:info@londonpro.org.uk">info@londonpro.org.uk</a></p>
                    <p>Web: <a href="http://www.londonpro.org.uk">www.londonpro.org.uk</a></p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>