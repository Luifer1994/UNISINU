<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SAE-UNIDINU</title>

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
        @include('layouts.script')
    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito';
            }
        </style>

        <style>
            body {
            background-image: url({{asset('assets/img/fondo.jpg')}});
            }
        </style>
    </head>
    <body style="background-size: cover;">
        <div class="text-right p-4">
            <div>
                @if (Route::has('login'))
                    <div>
                        @auth
                                <a style="color: red;" href="{{ url('/dashboard') }}" class="font-weight-bold">Dashboard</a>
                            @else
                                <a style="color: red" href="{{ route('login') }}" class="font-weight-bold"><b>Login</b></a>
                            @if (Route::has('register'))
                                <a style="color: red" href="{{ route('register') }}" class="ml-4 font-weight-bold"><b>Registrate</b></a>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="container">
            <div class="row p-5">
                <div class="col-12">
                    <h1 style="color: red; font-size:8vw;" class="font-weight-bold"><b>BIENVENIDOS</b></h1>
                </div>

                <div class="col-12">
                    <h2 class="font-weight-bold">
                        <samp class="font-weight-bold text-danger">
                        SAE
                        </samp>sistema de administracion de espacios UNISINU
                    </h2>
                </div>
            </div>
        </div>
    </body>
</html>
