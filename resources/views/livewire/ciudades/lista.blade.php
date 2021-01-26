<div class="card">
    @if (session()->has('mensaje'))
        <script>
            swal({
            title: "EXITO",
            text: " {{ session('mensaje') }}",
            icon: "success",
            button: "OK",
            });
        </script>
    @endif

    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Ciuades</h4>
            </div>
            <div class="col-6">
                <button class="btn btn-primary pull-right btn-rounded" data-toggle="modal" data-target="#agregarPais">
                    <i class="fas fa-plus-circle"></i> Ciudad
                </button>
                {{-- MODAL REGISTER --}}
                @include('livewire.ciudades.register')
            </div>
        </div>
    </div>
    <div class="card-body">
        <input wire:model='searh' class="form-control" placeholder="BUSCAR">
        <div class="card-body table-responsive">
            @if ($ciudades->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">DEPARTAMENTO</th>
                        <th scope="col">ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ciudades as $ciudad)
                            <tr>
                                <th>{{ $ciudad->id }}</th>
                                <td>{{ $ciudad->nombre }}</td>
                                <td>{{ $ciudad->nombreD }}</td>
                                <td width="30px">
                                    <button wire:click='edit({{ $ciudad->id }})' data-toggle="modal" data-target="#editarPais" type="button" class="btn btn-sm btn-success">
                                        <i style="font-size: 20px" class="fas fa-pencil-alt"></i>
                                    </button>

                                    @include('livewire.ciudades.edit')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <p class="text-black-50 bg-grey1">No hay resultados para la busqueda {{ $searh }}</p>
                </div>
            @endif
        </div>
        {{ $ciudades->links() }}
    </div>
  </div>





