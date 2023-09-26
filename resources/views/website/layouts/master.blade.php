<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }" type="image/x-icon"> --}}
    {{--  Thems Style --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="/assets/website/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/assets/website/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/website/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/website/css/jquery-ui.css">
    <link rel="stylesheet" href="/assets/website/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/website/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/website/css/style.css">
    <link rel="stylesheet" href="/assets/website/css/aos.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Boostrap .css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>
<body>
{{-- Include.Navbar --}}
    @include('website.includes.navbar')
{{-- End Navbar --}}
{{-- Start Section --}}
    {{-- <div class="@if(Route::is('login') || Route::is('login')) mt-5 @endif"> --}}
    @section('main-content')
    @show
    {{-- </div> --}}
{{-- End Section --}}
{{-- Start Footer --}}
    @include('website.includes.footer')
{{-- End Footer --}}
{{-- Bootstrap.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/website/js/jquery-3.3.1.min.js"></script>
<script src="/assets/website/js/jquery-ui.js"></script>
<script src="/assets/website/js/popper.min.js"></script>
<script src="/assets/website/js/bootstrap.min.js"></script>
<script src="/assets/website/js/owl.carousel.min.js"></script>
<script src="/assets/website/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/website/js/aos.js"></script>
<script src="/assets/website/js/main.js"></script>
</body>
</html>
