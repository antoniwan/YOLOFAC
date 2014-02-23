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
            body.html-email-template {
                background: #EDEFF1;
                color: #37485D;
                font-family: "Lato","Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif;
            }
            .html-email-template .container {
                width: 550px;
                box-sizing: border-box;
                margin: 50px auto;
            }
            .html-email-template header {
                padding: 15px 30px;
                background: #37485D;
                color: white;
                border-radius: 10px 10px 0 0;
            }
            .html-email-template #content {
                padding: 15px 30px;
                background: white;
                border-radius: 0 0 10px 10px;
            }
            .html-email-template footer {
                font-size: 12px;
                text-align: center;
                margin-top: 15px;
            }
            .html-email-template h2, .html-email-template h3, .html-email-template h4, .html-email-template h5, .html-email-template h6, .html-email-template p {
                margin-bottom: 15px;
            }
            .html-email-template p {
            }

            .html-email-template ul {
                margin: 15px 0;
                display: block;
            }
            .html-email-template ul li {
                margin: 5px 0;
                margin-left: 25px;
            }
            .html-email-template a {
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
