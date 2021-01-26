<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="red2">

        <a href="#" class="logo text-white">
            <img width="50px"  src="{{ asset('assets/img/logo2.png') }}" alt="">
            <span>SAE</span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">

        <div class="container-fluid">

            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar">
                            @if (Auth::user()->id_genero==1)
                                <img width="50px" src="{{ asset('assets/img/1.jpg') }}" alt="..." class="avatar-img rounded-circle">
                            @else
                                <img width="50px" src="{{ asset('assets/img/2.jpg') }}" alt="..." class="avatar-img rounded-circle">
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll">
                            <li>
                                <div class="user-box">
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="text-center">
                                    <a href="{{ route('logout') }}" class="text-danger"></a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                                        <i class="fas fa-sign-out-alt"></i>
                                            {{ __('Cerrar Sesion') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </div>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
