<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>UKM Carpool</title>

        <!— Fonts —>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!— Latest compiled and minified CSS —>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!— Optional theme —>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!— Latest compiled and minified JavaScript —>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!— Styles —>
        <style>
              body {
                background-image: url("/images/background/background.png");
                background-attachment: fixed;
                background-size: cover;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
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
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <img src="/images/background/Logo with tagline.png">
                </div>

                <div class="button">
                    @if (Route::has('login'))
                            @if (Auth::check())
                                <div><a href="{{ url('/home') }}" class="btn btn-success " role="button" type="button" style="font-weight: bold; width:200px">Get Started</a></div>
                            @else
                                <div><a href="{{ url('/home') }}" class="btn btn-success " role="button" type="button" style="font-weight: bold; width:200px">Get Started</a></div>
                                <br>
                                {{-- <div><a href="{{ url('/register') }}" class="btn btn-info " role="button" type="button" style="font-weight: bold; width:200px">Create An Account</a></div> --}}
                                <div><a href="{{ url('/validate') }}" class="btn btn-info " role="button" type="button" style="font-weight: bold; width:200px">Create An Account</a></div>
                            @endif
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
