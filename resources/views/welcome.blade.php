<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">


<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            

            .panda{
                background: #1d004d;
    border-radius: 31%;
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
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height main_container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                    <a class="navbar-brand p-0"  href="{{ url('/home') }}">
                        <img src="/img/logo.png" height="60">
                    </a>
                    @else
                        <a href="{{ url('/login') }}">SIGN IN</a>
                        <a href="{{ url('/register') }}">CREATE NEW ACCOUNT</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <a class="navbar-brand p-0"  href="{{ url('/home') }}">
                        <img src="/img/logo.png" height="120">
                    </a>

                    <img src="/img/panda.png" class="panda" width="300" alt="">
                </div>


            </div>
        </div>
    </body>
</html>
