<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        @section('title')
        <title>?</title>
        @show

        @section('stylesheets')
            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        @show


    </head>
    <body data-base="{{ url() }}" data-assets="{{ asset('') }}" data-route="{{ Route::current()->getName() }}">

        @yield('content')

    </body>
</html>
