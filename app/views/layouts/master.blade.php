<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{{ $locale }}"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="{{ $locale }}"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="{{ $locale }}"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="{{ $locale }}"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        @section('title')
        <title>#YOLO for a cause</title>
        @show

        @section('meta')
        <meta name="description" content="{{ trans('app.og.description') }}">
        <meta name="keywords" content="{{ trans('app.meta.keywords.home') }}">
        <meta name="robots" content="index, follow, nosnippet">
        @show
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
        <link rel="home" href="{{ url() }}">

        @section('stylesheets')
            <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato:300,400,700">
            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        @show

        <meta property="og:type" content="website">
        @section('og-tags')
        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        @show
        <meta property="og:admins" content="">

        @section('scripts')
        <script src="{{ asset('js/vendor/modernizr.js') }}"></script>
        @show
    </head>
    <body data-base="{{ url() }}" data-assets="{{ asset('') }}" data-route="{{ Route::current()->getName() }}">
        @include('partials.header')

        @yield('content')

        <script src="//connect.facebook.net/en_US/all.js#xfbml=1"></script>
        <script src="{{ asset('js/bundle.js') }}"></script>
        <div id="fb-root"></div>
    </body>
</html>
