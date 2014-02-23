<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        @section('title')
        <title>?</title>
        @show

        <style type="text/css">
            * {
                padding: 0;
                margin: 0;
            }
            html, body {
                background: #EDEFF1;
                color: #37485D;
                font-family: "Lato","Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif;
            }
            .container {
                width: 550px;
                box-sizing: border-box;
                margin: 50px auto;
            }
            header {
                padding: 15px 30px;
                background: #37485D;
                color: white;
                border-radius: 10px 10px 0 0;
            }
            #content {
                padding: 15px 30px;
                background: white;
                border-radius: 0 0 10px 10px;
            }
            footer {
                font-size: 12px;
                text-align: center;
                margin-top: 15px;
            }
            h2, h3, h4, h5, h6, p {
                margin-bottom: 15px;
            }
            p {
            }

            ul {
                margin: 15px 0;
                display: block;
            }
            ul li {
                margin: 5px 0;
                margin-left: 25px;
            }
            a {
                color: #37485D;
            }
        </style>


    </head>
    <body class="html-email-template" data-base="{{ url() }}" data-assets="{{ asset('') }}" data-route="{{ Route::current()->getName() }}">
        <div class="container">
            <header>
                <h1>#YOLO for a Cause</h1>
            </header>

            <div id="content">
                @yield('content')
            </div>

            <footer>
                <p>You're receiving this because you registered to our application.</p>
                <p>PayPal Battlehack Miami 2014 | Team OneBearDown</p>
            </footer>
    </body>
</html>
