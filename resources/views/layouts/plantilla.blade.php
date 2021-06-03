<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('titulo')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    {{-- Script y Estilos de fullcalendar --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.js"></script>


    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['{{ asset('assets/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    @include('layouts.script')
    @livewireStyles
</head>
<body>

{{-- DIV PRINCIPAL FLEX --}}
<div class="wrapper">



    @include('layouts.navbar')

        <!-- Sidebar -->
         @include('layouts.sidebar')
        <!-- End Sidebar -->

        {{-- Contenido --}}
        <div class="main-panel">
			<div class="content">
				<div class="page-inner">
                    @yield('contenido')
				</div>
			</div>
			@include('layouts.footer')
        </div>

        <!-- Custom template | don't include it in your project! -->
        @include('layouts.custom')
        <script src="{{ asset('assets/js/setting-demo.js') }}"></script>
        <!-- End Custom template -->
</div>
    <!--   Core JS Files   -->
@livewireScripts
<script type="text/javascript">
    window.livewire.on('store',()=>{
        $('.modal').modal('hide');
    });
</script>
</body>
</html>
