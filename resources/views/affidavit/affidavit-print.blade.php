<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Affidavit</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }

        .affidavit-container {
            width: 40%; /* Reduced width */
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            height: 85vh;
        }

        h1 {
            text-align: center;
            position: relative;
        }

        h1::after {
            content: '';
            display: block;
            width: 100%; /* 100% width line */
            height: 2px; /* Height of the line */
            background: black; /* Line color */
            position: absolute;
            left: 0;
            bottom: -10px; /* Space between heading and line */
        }

        .affidavit-content p, .affidavit-content ul {
            font-size: 16px; /* Reduced font size */
            line-height: 1.5; /* Slightly reduced line height */
        }

        .affidavit-content ul {
            list-style-type: none;
            padding-left: 0;
        }

        .signature-section {
            display: flex;
        }

        .signature-box {
            width: 150px; /* Reduced width */
            margin-left: 30px;
        }

        .signature-img {
            margin-top: 20px; 
            width: 150px; /* Reduced image width */
            height: auto;
        }

        .signature-section p {
            margin-left: 5px; /* Reduced margin */
        }

        /* Print Styles */
        @media print {
            body {
                background-color: white; /* Ensure white background in print */
                margin: 0; /* Remove page margins for print */
            }

            .affidavit-container {
                width: 100%; /* Full width for print */
                padding: 0;
                box-shadow: none; /* Remove any shadows for print */
                border: none;
                height: auto; /* Ensure it takes up appropriate height */
            }

            .signature-img {
                width: 100px; /* Adjust image size for print */
            }

            .affidavit-content p, .affidavit-content ul {
                font-size: 14px; /* Adjust font size for print */
            }

            h1::after {
                height: 1px; /* Thinner line for print */
            }

            .signature-section p {
                margin-left: 0; /* Adjust spacing for print */
            }

            /* Remove unnecessary margins or paddings */
            * {
                -webkit-print-color-adjust: exact; /* Ensure colors are preserved in print */
            }
        }
    </style>
</head>
<body>
    <div class="affidavit-container">
        <h1>GENERAL AFFIDAVIT</h1>
        <div class="affidavit-content">
            <p>State of ____</p>
            <p>County of ____</p>
            <p>
                I, ______ of ______, ______ 
                [Address] do hereby swear under oath that:
            </p>
            <ul>
                <li>1____________________</li>
                <li>2____________________</li>
                <li>3____________________</li>
            </ul>
            <p>
                Under penalty of perjury, I hereby declare and affirm that the above stated facts,
                to the best of my knowledge, are true and correct.
            </p>
           
            <div class="signature-section">
                <p>DATED this _ day of ___, 20_.</p>
                <div class="signature-box">
                    <img src="{{asset('digital-sign.jpeg')}}" alt="Signature" class="signature-img">
                    <p>Signature</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>