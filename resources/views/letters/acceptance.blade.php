<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <title>LPA Course acceptance letter</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: white;
        }

        .content {
            width: auto;
            height: 277mm;
            padding: 10mm;
            box-sizing: border-box;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .container {
            display: flex;
            font-size: 8px;
            justify-content: space-between;
        }

        .header .lpa_logo {
            max-width: 130px;
            /* Reduced size */
            height: auto;
            padding-right: 15px;
        }

        .header .location_pin {
            max-width: 50px;
            /* Reduced size */
            height: auto;
            padding-right: 15px;
        }

        .header .container p {
            font-size: 15px;
            /* Reduced font */
            text-align: right;
        }

        /* BODY */
        .body {
            padding-left: 15px;
            padding-right: 15px;
        }

        .body .intro {
            font-size: 15px;
            margin-top: 20px;
            /* Reduced spacing */
            display: flex;
            justify-content: space-between;
        }

        .body .intro .date {
            margin-top: -10px;
            align-self: self-start;
        }

        .body h4 {
            text-align: center;
            text-decoration: underline;
            font-size: 15px;
        }

        .body p {
            font-size: 15px;
            /* Reduced */
            line-height: 18px;
            /* Reduced */
        }

        /* TABLES */
        .body .tables {
            display: flex;
            justify-content: space-between;
            column-gap: 10px;
            /* Reduced spacing */
        }

        .body .tables table {
            border-collapse: collapse;
            width: 50%;
        }

        .body .tables th,
        .body .tables td {
            padding: 3px 5px;
            /* Reduced padding */
            font-size: 15px;
            /* Reduced font */
            border: 1px solid #000;
        }

        /* FOOTER */
        .body .footer {
            display: flex;
            justify-content: space-between;
        }

        .body .footer .signature {
            max-width: 200px;
            /* Reduced size */
        }

        .body .footer .qr {
            width: 80px;
            /* Reduced size */
            height: max-content;
        }

        /* MAIN FOOTER */
        .main-footer {
            text-align: center;
            color: #215e99;
            font-size: 11px;
            /* Reduced */
        }

        .main-footer .border {
            width: 100%;
            border-top: 2px solid #215e99;
            /* Reduced thickness */
        }

        .main-footer p {
            font-size: 15px;
            /* Reduced */
            line-height: auto;
        }
    </style>
</head>

<body>
    <div class="content">
        <!-- header -->
        <div class="header">
            <div class="container">
                <div>
                    <img
                        src="{{ public_path('storage/resources/lpa-logo.png') }}"
                        alt=""
                        class="lpa_logo" />
                </div>
                <h1>
                    LONDON <br />
                    PROFESSIONAL <br />
                    ACADEMY
                </h1>
            </div>
            <div class="container">
                <p>
                    Roycraft House <br />
                    15 Linton Road <br />
                    Barking <br />
                    IG11 8HE <br />
                    United Kingdom
                </p>
                <div>
                    <img
                        src="{{ public_path('storage/resources/location_pin.png') }}"
                        alt=""
                        class="location_pin" />
                </div>
            </div>
        </div>
        <!-- Body -->
        <div class="body">
            <!--  -->
            <div class="container">
                <div class="intro">
                    <div class="embassy">
                        <div class="uk-embassy">British High Commission</div>
                        <div class="country-embassy">{{ $student->embassy }}</div>
                    </div>
                    <div class="date">{{ date('jS F Y') }}</div>
                </div>
            </div>
            <!--  -->
            <h4>COURSE ACCEPTANCE LETTER</h4>
            <!-- text -->
            <p>
                Dear Entry Clearance Officer, <br />
                I write to confirm that below mentioned student has met the criteria
                for and has been accepted for the course of study at our institute.
                Please find the details for the student below:
            </p>

            <!-- Tables -->
            <div class="tables">
                <table rules="all">
                    <tr>
                        <th>Application Ref.</th>
                        <td>Ref: LPA/{{ $student->course_code }}{{ $student->r_id }}</td>
                    </tr>
                    <tr>
                        <th>Student Name</th>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Passport No</th>
                        <td>{{ $student->passport_number }}</td>
                    </tr>
                </table>

                <table rules="all">
                    <tr>
                        <th>Gender</th>
                        <td>{{ $student->gender }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ $student->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td>{{ $student->nationality }}</td>
                    </tr>
                </table>
            </div>

            <p>The course details are as follows:</p>

            <!-- Tables -->
            <div class="tables">
                <table rules="all">
                    <tr>
                        <th>Course</th>
                        <td>{{ $course->course_name }}</td>
                    </tr>
                    <tr>
                        <th>Qualification</th>
                        <td>{{ $course->final_qualification }}</td>
                    </tr>
                    <tr>
                        <th>Hours per week</th>
                        <td>{{ $course->hours_per_week }}</td>
                    </tr>
                    <tr>
                        <th>Commencement</th>
                        <td>
                            {{ date('jS F Y', strtotime($course->course_completion_date)) }}
                        </td>
                    </tr>
                    <tr>
                        <th>Tuition Fee</th>
                        <td>£{{ number_format($course->tuition_fee, 2) }} (Paid)</td>
                    </tr>
                </table>

                <table rules="all">
                    <tr>
                        <th>Study Level</th>
                        <td>Level 2 Certification</td>
                    </tr>
                    <tr>
                        <th>Course Type</th>
                        <td>Full Time</td>
                    </tr>
                    <tr>
                        <th>Duration/th></th>
                        <td>{{$course->course_duration}}</td>
                    </tr>
                    <tr>
                        <th>Completion</th>
                        <td>£{{ number_format($course->registration_fee, 2) }} (Paid)</td>
                    </tr>
                    <tr>
                        <th>Registration</th>
                        <td>£{{ number_format($course->registration_fee, 2) }} (Paid)</td>
                    </tr>
                </table>
            </div>
            <!--  -->
            <p>
                The student has paid their full course fees in advance. I would be
                grateful for any assistance you can provide this student to enable
                them to process a visa to enter the United Kingdom to commence his
                course of studies. For information on short-term study visas, refer to
                the link:
                <a href=" https://www.gov.uk/visa-to-study-english">
                    https://www.gov.uk/visa-to-study-english</a>
                Should you require any further information regarding the student’s
                forthcoming studies, please do not hesitate to contact us. <br />
                Yours faithfully
            </p>

            <div class="footer">
                <div>
                    <img
                        src="{{ public_path('storage/resources/paul-signature.jpeg') }}"
                        alt="signature"
                        class="signature" />
                    <p>
                        <b>Director of Admissions</b><br />
                        London Professional Academy <br />
                        United Kingdom
                    </p>
                </div>
                <img src="{{ $qrCodePath }}" alt="QR code" class="qr" />
            </div>
        </div>
        <!-- footer -->
        <div class="main-footer">
            <div class="border">
                <div class="text">
                    <p>
                        London Professional Academy (Registered in England and Wales.
                        Company No: 12249241) <br />
                        <b>Tel:</b> +44 (0) 203 4111 651 -
                        <b>Email:</b> info@londonpro.org.uk - <b>Web:</b>
                        http://www.londonpro.org.uk
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>