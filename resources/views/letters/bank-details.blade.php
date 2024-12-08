<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Payment Information</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        .container {}

        /* Header Table */
        .header-table {
            width: 100%;
            margin-bottom: 10px;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: top;
            border: none;
            padding: 5px;
        }

        .logo img {
            width: 150px;
        }

        .logo-text {
            font-size: 14px;
            text-transform: uppercase;
            line-height: 1.4;
            padding-left: 2px;
        }

        #lg-text {
            margin-left: -20px;
        }

        .address {
            text-align: right;
            font-size: 12px;
            line-height: 1.4;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table th,
        table td {
            padding: 6px 8px;
            border: 1px solid #e5e7eb;
            font-size: 12px;
            text-align: left;
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

        hr {
            margin: 10px 0;
        }

        footer {
            font-size: 10px;
            text-align: center;
            margin-top: 10px;
            color: #6b7280;
        }

        footer a {
            color: #3b82f6;
            text-decoration: none;
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

        <!-- Date and Reference Section -->
        <p><strong>{{ now()->format('jS F Y') }}</strong></p>
        <p>Ref: LPA/{{ $student->course_code }}{{ $student->r_id }}</p>
        <p>Re: {{ $student->first_name }} {{ $student->last_name }}</p>

        <!-- Main Content Section -->
        <h2 style="text-align:center">Online Payment Information</h2>
        <p>Transfer the money directly from your bank to our account. Please ensure your relevant student ID or admission reference number is quoted as reference for the payment.</p>

        <!-- Student Details -->
        <h4>Student Details</h4>
        <table>
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

        <!-- Bank Details -->
        <h4>Bank Details</h4>
        <table>
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

        <!-- International Payment Details -->
        <h4>International Payment Details</h4>
        <table>
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

        <!-- Footer -->
        <footer>
            <p>London Professional Academy (Registered in England and Wales. Company No: 12249241)</p>
            <p>Tel: +44 (0) 203 4111 651 - Email: <a href="mailto:info@londonpro.org.uk">info@londonpro.org.uk</a></p>
        </footer>
    </div>
</body>

</html>