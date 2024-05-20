<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <style>
        body{
            background-color: #f9f9f9;
        }

        .mainDiv {
            display: flex;
            min-height: 100%;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
            font-family: 'Open Sans', sans-serif;
        }

        .cardStyle {
            width: 500px;
            border-color: white;
            background: #fff;
            padding: 36px 0;
            border-radius: 4px;
            margin: 30px 0;
            box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);
        }

        #signupLogo {
            max-height: 100px;
            margin: auto;
            display: flex;
            flex-direction: column;
        }

        .formTitle {
            font-weight: 600;
            margin-top: 20px;
            color: #2F2D3B;
            text-align: center;
        }

        .inputLabel {
            font-size: 12px;
            color: #555;
            margin-bottom: 6px;
            margin-top: 24px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="mainDiv">
        <div class="cardStyle">
            
            <img src="" id="signupLogo" />

            <h2 class="formTitle">
                Berhasil Reset Password
            </h2>
            <p class="formTitle">Kembali ke Aplikasi</p>
        </div>
    </div>
    <script>
        document.getElementById('signupLogo').src =
            "data:image/png;base64,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";
        enableSubmitButton();
    </script>
</body>

</html>
