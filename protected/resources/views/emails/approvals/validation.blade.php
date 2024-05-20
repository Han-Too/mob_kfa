<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Application Under Validation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #666666;
        }

        .details {
            margin-top: 20px;
            border-top: 1px solid #cccccc;
            padding-top: 10px;
        }

        .signature {
            margin-top: 20px;
        }

        .signature p {
            color: #333333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Merchant Application Validated</h1>
        
        <p>Dear {{$data['nama_merchant']}},</p>

        <p>We are pleased to inform you that your merchant application has been successfully validated. This confirms the accuracy and completeness of the provided information.  Please wait for the next step.</p>

        <p>If you have any questions or require further assistance, do not hesitate to contact us. We look forward to a fruitful partnership.</p>

        <div class="signature">
            <p>Thank you for choosing Cashlez.</p>
            <p>support@cashlez.com</p>
        </div>
    </div>
</body>
</html>
