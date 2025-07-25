<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Webpage</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #EEF1F8;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: 72%;
            height: 70%;
            background-color: #FFFFFF;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 2px 2px 30px rgba(66, 57, 238, .2);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('https://i.postimg.cc/pdL2vfK9/bg.gif');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .sign-up {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .heading {
            font-family: calibri;
            color: rgba(30, 30, 30, 1);
        }

        .text {
            width: 350px;
            height: 50px;
            box-shadow: 2px 6px 18px rgba(66, 57, 238, .3);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
        }

        .text input {
            height: 40px;
            width: 80%;
            outline: none;
            border: none;
            font-size: 14px;
            margin: 5px;
        }

        .text img {
            margin-left: 20px;
        }

        .conditions {
            font-family: myriad pro;
            color: #BBC1CB;
            font-size: 14px;
        }

        .conditions a {
            color: #7D22E3;
            font-weight: 500;
        }

        .terms {
            display: flex;
            align-items: center;
        }

        button {
            width: 200px;
            height: 40px;
            outline: none;
            border: none;
            border-radius: 20px;
            background: linear-gradient(-30deg, #3B02ED, #8E2AE0 55%);
            box-shadow: 2px 6px 16px rgba(66, 57, 238, .3);
            color: #FFFFFF;
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 13px;
            cursor: pointer;
            transition: all .3s ease;
        }

        button:active {
            transform: scale(1.1);
        }

        .text-container {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .text-container p {
            width: 70%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight: 400;
        }

        .text-container h1 {
            font-family: Arial, Helvetica, sans-serif;
            color: #2D2C2C;
            line-height: 20px;
        }

        @media screen and (max-width: 1080px) {
            .text-container {
                display: none;
            }

            .container {
                height: 90%;
            }
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 85%;
            }
        }

        @media screen and (max-width: 500px) {
            .text {
                width: 300px;
            }
        }

        @media screen and (max-width: 420px) {
            .container {
                width: 95%;
            }

            .heading {
                text-align: center;
            }

            .conditions {
                text-align: center;
            }

            input[type="checkbox"] {
                margin-right: 5px;
            }

            .text {
                width: 280px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sign-up">
            <h1 class="heading">Hello, friend!</h1>



            <div class="text">
                <img src="https://i.postimg.cc/DZBPRgvC/email.png" alt="icon" height="12">
                <input type="email" placeholder="Email">
            </div>

            <div class="text">
                <img src="https://i.postimg.cc/Nj5SDK4q/password.png" alt="icon" height="20">
                <input type="password" placeholder="Password">
            </div>



            <div class="terms">
                <input type="checkbox">
                <p class="conditions">I read and agree to <a href="#">terms & conditions</a></p>
            </div>

            <button type="submit">CREATE ACCOUNT</button>
            <p class="conditions">Already have an account? <a href="{{ route('seller-signup') }}">Sign up</a></p>

        </div>

        <div class="text-container">
            <h1>Glad to see you!</h1>
            <p>Welcome, please fill in the blanks for sign up</p>
        </div>
    </div>
</body>

</html>