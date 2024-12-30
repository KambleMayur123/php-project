<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Page Layout</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 40%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            font-size: 12px;
        }
        .page-title {
            text-align: center;
            text-decoration: underline;
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: bold;
        }
        .info-table {
            width: 90%;
            border-collapse: collapse;
            font-size: 14px;
            margin: 0 auto;
        }
        .info-table, .info-table th, .info-table td {
            border: 1px solid black;
        }
        .info-table th, .info-table td {
            padding: 8px;
            text-align: left;
        }
        .signature-section {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .signature {
            width: 30%;
            text-align: center;
        }
        .signature img {
            width: 100px;
            display: block;
            margin: 0 auto;
        }
        .footer {
            margin-top: 20px;
            border-top: 1px dotted black;
            padding-top: 5px;
            text-align: center;
            font-size: 15px;
        }

        /* Print styles */
        @media print {
            body, .container {
                width: 100%;
                margin: 0;
                padding: 0;
                box-shadow: none;
                font-size: 12px; /* Adjust font size if needed for printing */
            }
            .container {
                page-break-inside: avoid; /* Prevents page break inside the container */
            }
            .info-table {
                width: 100%; /* Full width for printing */
            }
            .signature img {
                width: 100px;
            }
            .footer {
                font-size: 12px;
            }
            .page-title {
                font-size: 20px; /* Adjust the heading size for print */
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="page-title">FIRST PAGE</h1>

        <table class="info-table">
            <tr class="table-row">
                <td class="table-cell">1</td>
                <td class="table-cell">Name<br>Changed Name</td>
                <td class="table-cell">Tushar Sudam Suryawanshi<br>-------------------------</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">2</td>
                <td class="table-cell">Race/Cast</td>
                <td class="table-cell">Hindu</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">3</td>
                <td class="table-cell">A. Address / Residence <br>B. Allowed address</td>
                <td class="table-cell">At- Sangli, Tal-Palus, Dist – Sangli, Pin - 416316</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">4</td>
                <td class="table-cell">Fathers name</td>
                <td class="table-cell">Sudam Balkrish Suryawanshi</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">5</td>
                <td class="table-cell">Father's Address</td>
                <td class="table-cell">At- Sangli, Tal-Palus, Dist – Sangli, Pin - 416316</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">6</td>
                <td class="table-cell">Birth Date by the Christian Era as- nearly as can be ascertained</td>
                <td class="table-cell">14/04/2000<br>Fourteenth April two thousand</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">7</td>
                <td class="table-cell">Height</td>
                <td class="table-cell">5 feet 7 inches</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">8</td>
                <td class="table-cell">Birth Mark</td>
                <td class="table-cell">Right hand middle fingers white mark</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">9</td>
                <td class="table-cell">Joining Time Education Qualification</td>
                <td class="table-cell">B.A</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">10</td>
                <td class="table-cell">Medical Certificate Number</td>
                <td class="table-cell">TSMNA656</td>
            </tr>
            <tr class="table-row">
                <td class="table-cell">11</td>
                <td class="table-cell">Job Joining Date</td>
                <td class="table-cell">01/10/2025</td>
            </tr>
        </table>

        <div class="signature-section">
            <div class="signature">
                <img src="<?php echo e(asset('digital-sign.jpeg')); ?>" alt="Signature Valic">
                <p>Signature Of servant</p>
            </div>
            <div class="signature">
                <img src="<?php echo e(asset('digital-sign.jpeg')); ?>" alt="Signature Valic">
                <p>Signature HOD</p>
            </div>
        </div>

        <div class="footer">
            टीप - या पृष्ठावरील नोंदीस निवडीन प्रत्येक पाच वर्षानंतर पुन्हा नव्याने करणे आवश्यक.<br>
            The entries in this page should be renewed or re-attested at least every five years.
        </div>
    </div>

</body>
</html><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/user-profile/user-details-print.blade.php ENDPATH**/ ?>