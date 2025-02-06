<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="style.css" /> -->

    <title>LPA student-banking-details</title>

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
            font-size: 16px;
        }

        .body p {
            font-size: 13px;
            /* Reduced */
            line-height: 18px;
            /* Reduced */
        }

        .body .detail {
            font-size: 13px;
        }

        .detail {
            text-align: left;
        }

        .title {
            color: white;
        }

        table,
        td,
        th {
            border: 1px solid #156082;
            border-collapse: collapse;
            color: black;
            padding: 4px;
        }

        .student,
        .bank,
        .account,
        .international {
            margin: 0 0 20px 0;
        }

        th {
            width: 35%;
        }

        table tr:first-child {
            background-color: #156082;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #c1e4f5;
        }

        tr:nth-child(odd) {
            background-color: #ffff;
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
                    <div class="date">{{ now()->format('jS F Y') }}</div>
                    <div class="ref">
                        Ref. LPA/{{ $student->course_code }}{{ $student->r_id }}
                    </div>
                    <div class="re">
                        Re: {{ $student->first_name }} {{ $student->last_name }}
                    </div>
                </div>
                <!--  -->
                <h4>ONLINE PAYMENT INFORMATION</h4>

                <!-- text -->
                <p>
                    Transfer the money directly from your bank to our account. Please
                    ensure your relevant student ID or student admission reference
                    number is quoted as reference for the payment.
                </p>
                <div class="detail">
                    <!-- student -->
                    <div class="student">
                        <table style="width: 100%">
                            <tr class="title">
                                <th style="color: aliceblue" colspan="2">Student Details</th>
                            </tr>
                            <tr>
                                <th>Student Name</th>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ $student->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th>Student Admission Reference</th>
                                <td>LPA/{{ $student->r_id }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- Bank -->
                    <div class="bank">
                        <table style="width: 100%">
                            <tr class="title">
                                <th style="color: aliceblue" colspan="2">Bank Details</th>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td>Metro Bank</td>
                            </tr>
                            <tr>
                                <th>Account Name</th>
                                <td>London Professional Academy Limited</td>
                            </tr>
                            <tr>
                                <th>Branch Address</th>
                                <td>114 High Road, Ilford, IG1 1BY, United Kingdom</td>
                            </tr>
                            <tr>
                                <th>Bank Head Office Address</th>
                                <td>1 Southampton Row, London, WC1B 5HA, United Kingdom</td>
                            </tr>
                            <tr>
                                <th>Contact</th>
                                <td>+44 (0) 345 0808 500</td>
                            </tr>
                        </table>
                    </div>
                    <!-- Account -->
                    <div class="account">
                        <table style="width: 100%">
                            <tr class="title">
                                <th style="color: aliceblue" colspan="2">Account Details</th>
                            </tr>
                            <tr>
                                <th>Sort Code</th>
                                <td>23-05-80</td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td>54569785</td>
                            </tr>
                        </table>
                    </div>
                    <!-- International -->
                    <div class="international">
                        <table style="width: 100%">
                            <tr class="title">
                                <th style="color: aliceblue" colspan="2">
                                    Account Details for International Payments
                                </th>
                            </tr>
                            <tr>
                                <th>SWIFT</th>
                                <td>MYMBGB2L</td>
                            </tr>
                            <tr>
                                <th>IBAN</th>
                                <td>GB12MYMB23058054569785</td>
                            </tr>
                            <tr>
                                <th>BIC</th>
                                <td>MYMBGB2LXXX</td>
                            </tr>
                        </table>
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