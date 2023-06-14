<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('/img/bg_login.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            /* background-position: center center; */
        }

        form {
            height: 520px;
            width: 450px;
            background-color: rgba(255, 255, 255, 0.3);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            color: black;
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: bold;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            color: black;
            background-color: rgba(255, 255, 255, 0.75);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: black;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 10px;
            display: flex;
        }

        .social div {
            width: auto;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            color: #eaf0fb;
            text-align: center;
        }

        .btn {
            background-color: black;
            color: white;
            padding-left: 5px;
            padding-right: 5px;
            border-radius: 15px;


        }
    </style>
</head>

<body>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if (session('statusError'))
    <div class="alert alert-danger">
        {{ session('statusError') }}
    </div>
    @endif

    <form action="/login" method="post">
        @csrf
        <h3>Login Penonton Konser</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" name="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password">

        <button>Log In</button>
        <div class="social">
            <div class="go">Dont Have Account ? Register <span class="btn"><a href="/penonton/create"> Here</a></span>
            </div>
        </div>
    </form>
</body>

</html>