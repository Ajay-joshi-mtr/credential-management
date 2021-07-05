<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MP2IT</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/logo.png')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Styles -->
    <style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 65px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 33px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        background:#337ab7;
        color:white;
        border-radius:20px
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    </style>
</head>

<body style="background:aliceblue;">
    <div class="flex-center full-height">

        <div class="content">
            <div class="title m-b-md text-xs">
            Welcome to MP2IT
            </div>
            @if (Route::has('login'))
            <div class=" links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>
Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
</body>

</html>