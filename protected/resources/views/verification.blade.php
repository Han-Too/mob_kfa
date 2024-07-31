<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <style>
        body {
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

        #errorMessage {
            color: red;
            font-size: 12px;
            margin-top: 10px;
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

        .inputDiv {
            width: 70%;
            display: flex;
            flex-direction: column;
            margin: auto;
        }

        input {
            height: 40px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            border: solid 1px #ccc;
            padding: 0 11px;
        }

        input:disabled {
            cursor: not-allowed;
            border: solid 1px #eee;
        }

        .buttonWrapper {
            margin-top: 40px;
        }

        .submitButton {
            width: 70%;
            height: 40px;
            margin: auto;
            display: block;
            color: #fff;
            background-color: #065492;
            border-color: #065492;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .submitButton:disabled,
        button[disabled] {
            border: 1px solid #cccccc;
            background-color: #cccccc;
            color: #666666;
        }

        #loader {
            position: absolute;
            z-index: 1;
            margin: -2px 0 0 10px;
            border: 4px solid #f3f3f3;
            border-radius: 50%;
            border-top: 4px solid #666666;
            width: 14px;
            height: 14px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
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
            <form action="" method="post" name="signupForm" id="signupForm">
            {{-- <form action="/api/web/reset-password" method="post"> --}}
                @csrf

                <img src="" id="signupLogo" />

                <h2 class="formTitle">
                    Reset Password
                </h2>

                <div class="inputDiv">
                    <label class="inputLabel" for="password">New Password</label>
                    <input type="password" id="password" name="password" oninput="clearError()" required>
                </div>

                <div class="inputDiv">
                    <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" oninput="clearError()">
                    <label class="errorMessage" id="errorMessage"></label>
                </div>

                <div class="buttonWrapper">
                    <button type="submit" id="submitButton" onclick="validateSignupForm()"
                        class="submitButton pure-button pure-button-primary">
                        <span>Continue</span>
                        <span id="loader"></span>
                    </button>
                </div>

            </form>
        </div>
    </div>
    <script>
        var apiKey = @json(env('API_KEY', ''));
        var apiURL = "https://dev-mob.cashlez.com/mob";
        // var apiURL = @json(env('APP_URL', ''));
        var token = @json($token);
    </script>
    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirmPassword");

        document.getElementById('signupLogo').src =
            "data:image/png;base64,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";
        enableSubmitButton();

        function clearError(){
            document.getElementById('errorMessage').innerHTML = ''
        }

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Not Match");
                return false;
            } else {
                confirm_password.setCustomValidity('');
                return true;
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        function enableSubmitButton() {
            document.getElementById('submitButton').disabled = false;
            document.getElementById('loader').style.display = 'none';
        }

        function disableSubmitButton() {
            document.getElementById('submitButton').disabled = true;
            document.getElementById('loader').style.display = 'unset';
        }

        function validateSignupForm() {
            var form = document.getElementById('signupForm');

            for (var i = 0; i < form.elements.length; i++) {
                if (form.elements[i].value === '' && form.elements[i].hasAttribute('required')) {
                    console.log('There are some required fields!');
                    return false;
                }
            }

            if (!validatePassword()) {
                return false;
            }

            onSignup();
        }

        function onSignup() {
            console.log("halo");
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            var postData = {
                password: password,
                password_confirmation: confirmPassword,
                token: token
            };
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                disableSubmitButton();
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    console.log(response.message);
                    if (!response.status) {
                        document.getElementById('errorMessage').innerHTML = response.message;
                        setTimeout(function() {
                            enableSubmitButton();
                        }, 1000);
                    } else {
                        disableSubmitButton();
                        window.location.href = `${apiURL}/verification`
                    }
                } else {
                    console.log('AJAX call failed!');
                    setTimeout(function() {
                        enableSubmitButton();
                    }, 1000);
                }

            };

            xhttp.open("POST", `${apiURL}/api/web/reset-password`, true);
            xhttp.setRequestHeader("C-API-KEY", apiKey);
            xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send(JSON.stringify(postData));
        }
    </script>
</body>

</html>
