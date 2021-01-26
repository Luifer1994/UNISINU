<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SAE-UNISINU</title>

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

        @if (session()->has('mensaje'))
        <script>
            swal({
            title: "Exito",
            text: " {{ session('mensaje') }}",
            icon: "success",
            button: "OK",
            });
        </script>
        @endif

        @if (session()->has('mensaje2'))
        <script>
            swal({
            title: "Error",
            text: " {{ session('mensaje2') }}",
            icon: "error",
            button: "OK",
            });
        </script>
        @endif
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
              <div class="col-xl-4 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->

                      <div>
                        <div class="p-4">
                            <div class="text-center">
                                <img width="80px" src="{{ asset('assets/img/logo.png') }}" alt="">
                            </div>
                            <div class="text-center">
                                <h1 class="text-bold">SAE</h1>
                                <p>SISTEMA DE ADMINISTRACION DE ESPACIOS UNISINU</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="p-2">
                                    <label for="email">
                                        Email
                                    </label>
                                    <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" />
                                    @error('email')<p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="p-2">
                                    <label for="password">
                                        Contraseña
                                    </label>
                                    <input id="password" class="form-control" type="password" name="password" />
                                    @error('password')<p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="text-center p-2">
                                    <button style="font-size: 13px" class="btn btn-sm btn-primary btn-block">
                                        Entrar
                                    </button>
                                </div>
                            </form>
                            <div class=" text-center mb-1">
                                    <!-- Button trigger modal -->
                                <a type="button" class="text-primary btn" data-toggle="modal" data-target="#register">
                                    Registrate
                                </a>
                                @include('auth.register')
                            </div>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
    </body>
</html>

