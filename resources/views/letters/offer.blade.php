<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="style.css" /> -->
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
            background-color: white;
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
            max-width: 150px;
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
            font-size: 13px;
            margin-top: 20px;
            /* Reduced spacing */
        }

        .body h4 {
            text-align: center;
            text-decoration: underline;
            font-size: 14px;
        }

        .body p {
            font-size: 13px;
            /* Reduced */
            line-height: 18px;
            /* Reduced */
        }

        .body .info {
            display: flex;
            justify-content: space-between;
        }

        .body .detail {
            padding-left: 20px;
            font-size: 13px;
        }

        .detail {
            text-align: left;
        }

        table,
        th {
            width: 20%;
        }

        /* FOOTER */
        .body .footer {}

        .body .footer .signature {
            max-width: 200px;
            /* Reduced size */
        }

        .body .note {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            margin: 0;
        }

        .body .note .bg {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.241);
            font-size: 13px;
            /* Reduced */
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
            font-size: 14px;
            /* Reduced */
            line-height: auto;
        }
    </style>
    <title>LPA Course Offer letter</title>
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
                    <div class="date">
                        {{ date('jS F Y', strtotime($student->created_at)) }}
                    </div>
                    <div class="ref">
                        Ref. LPA/{{ $student->course_code }}{{ $student->r_id }}
                    </div>
                    <div class="re">
                        Re: {{ $student->first_name }} {{ $student->last_name }}
                    </div>
                </div>
                <!--  -->
                <h4>PROVISIONAL OFFER OF ADMISSION</h4>
                <div class="info">
                    <div class="name">
                        Dear MR. {{ $student->first_name }} {{ $student->last_name }}
                    </div>
                    <div class="dob">Date of Birth: {{ $student->date_of_birth }}</div>
                </div>
                <!-- text -->
                <p>
                    Thank you for sending your completed application form, which has
                    been carefully considered by our Board of Education Advisors and
                    your subsequent interview. <br />
                    You will be pleased to learn that based on the information that you
                    have provided; the board has decided to offer you a place at London
                    Professional Academy. <br />
                    The details are as follows:
                </p>
                <div class="detail">
                    <table style="width: 100%">
                        <tr>
                            <th>Course</th>
                            <td>{{ $course->course_name }}</td>
                        </tr>
                        <tr>
                            <th>Qualification</th>
                            <td>{{ $course->final_qualification }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>FULL TIME, Level 2, 16 - 18 hours per week</td>
                        </tr>
                        <tr>
                            <th>Commencement</th>
                            <td>
                                {{ date('jS F Y', strtotime($course->commencement_date)) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Duration</th>
                            <td>{{ $course->course_duration }} months</td>
                        </tr>
                        <tr>
                            <th>Completion</th>
                            <td>
                                {{ date('jS F Y', strtotime($course->course_completion_date))
                  }}
                            </td>
                        </tr>
                        <tr>
                            <th>Payment required</th>
                            <td>
                                £{{ number_format($course->tuition_fee, 2) }} Tuition Fee +
                                (Registration Fee £{{ number_format($course->registration_fee,
                  2) }} Non-refundable)
                            </td>
                        </tr>
                        <tr>
                            <th>Bank Deposit</th>
                            <td>
                                28 days bank deposit required, covering 11 months living
                                expenses plus your tuition fees.
                            </td>
                        </tr>
                    </table>
                </div>
                <!--  -->
                <p>
                    Please make a Bank transfer or Bank Draft payable to
                    <b>
                        “London Professional Academy”, Sort Code: 23-05- 80, Account
                        Number: 54569785 (for international payments, IBAN:
                        GB12MYMB23058054569785)</b>
                    <br />
                    <br />
                    If you decide to accept this offer, please send the above required
                    payment along with your 28 days bank statement, upon receipt of
                    which we will process your enrolment and forward you an Acceptance
                    letter, Accommodation letter, Visa support documents along with an
                    invoice for your proposed course: <br />
                    <br />
                    If you have any queries or require further information concerning
                    this offer, please get in touch with us and we will be happy to
                    advise you.
                    <br />
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
                </div>
                <div class="note">
                    <div class="bg">
                        Note: This letter is conditional & not valid for visa application
                        purposes.
                    </div>
                </div>
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