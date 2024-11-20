<!DOCTYPE html>
<html>

<head>
    <title>Admission Documents</title>
</head>

<body>
    <h1>Dear {{ $student->first_name }} {{ $student->last_name }},</h1>

    <p>We are pleased to provide you with the following documents regarding your admission:</p>

    <ul>
        <li>Offer Letter</li>
        <li>Bank Details Letter</li>
        <li>Acceptance Letter</li>
    </ul>

    <p>Please find the attached documents for your reference. If you have any questions or need further assistance, feel free to contact us.</p>

    <p>Thank you,</p>
    <p>The Admissions Team</p>
</body>

</html>