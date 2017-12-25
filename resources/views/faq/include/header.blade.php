 <!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('faq_style/css/reset.css') }}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('faq_style/css/style.css') }}"> <!-- Resource style -->
    <script src="{{ asset('faq_style/js/modernizr.js') }}"></script> <!-- Modernizr -->
    <title>{{ $header }}</title>
</head>
<body>
<header>
    <h1>{{ $header }}</h1>
</header>
@yield('content')
