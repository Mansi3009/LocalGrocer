<!DOCTYPE html>

<html lang="en">
<head>
    <title>LocalGrocer</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/productdisplay.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sidenavbar.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/productdisplay.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navsidebar.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/payment.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="custom.css">

</head>

<body>

@include('layout.nav')

<div class="container">
    @yield('content')
</div>

@yield('scripts')
</body>
</html>