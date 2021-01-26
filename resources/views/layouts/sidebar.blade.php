<div class="sidebar sidebar-style-2" data-background-color="red2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav nav-white">
                <li class="nav-item active">
                    <a  href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">COMPONENTES</h4>
                </li>
                @if (Auth::user()->id_rol==1)

                    <li class="nav-item">
                        <a data-toggle="collapse" href="#link" class="collapsed" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                            <p>Parámetros Basicos</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="link" style="">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('paises') }}">
                                        <span class="sub-item">Paises</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('departamentos') }}">
                                        <span class="sub-item">Departamentos</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('ciudades') }}">
                                        <span class="sub-item">Ciudades</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>

                    <li class="nav-item">
                        <a data-toggle="collapse" href="#link2" class="collapsed" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                            <p>Modulos Intermedios</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="link2" style="">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('instituciones') }}">
                                        <span class="sub-item">Instituciones</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('sedes') }}">
                                        <span class="sub-item">Sedes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('categorias') }}">
                                        <span class="sub-item">Categorias</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('espacios') }}">
                                        <span class="sub-item">Espacios</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>

                    <li class="nav-item">
                        <a data-toggle="collapse" href="#link3" class="collapsed" aria-expanded="false">
                            <i class="fas fa-users"></i>
                            <p>Parametros de Ingreso</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="link3" style="">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('funcionarios') }}">
                                        <span class="sub-item">Funcionarios</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

