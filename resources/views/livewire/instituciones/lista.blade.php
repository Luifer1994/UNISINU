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
                <h4 class="card-title">Instituciones</h4>
            </div>
            <div class="col-6">
                <button class="btn btn-primary pull-right btn-rounded" data-toggle="modal" data-target="#registrar">
                    <i class="fas fa-plus-circle"></i> Institucion
                </button>
                {{-- MODAL REGISTER --}}
                @include('livewire.instituciones.register')
            </div>
        </div>
    </div>
    <div class="card-body">
        <input wire:model='searh' class="form-control" placeholder="BUSCAR">
        <div class="card-body table-responsive">
            @if ($instituciones->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">PAIS</th>
                        <th scope="col">ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($instituciones as $institucione)
                            <tr>
                                <th>{{ $institucione->id }}</th>
                                <td>{{ $institucione->nombre }}</td>
                                <td>{{ $institucione->nombreP }}</td>
                                <td width="30px">
                                    <button wire:click='edit({{ $institucione->id }})' data-toggle="modal" data-target="#editar" type="button" class="btn btn-sm btn-success">
                                        <i style="font-size: 20px" class="fas fa-pencil-alt"></i>
                                    </button>

                                    @include('livewire.instituciones.edit')
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
        {{ $instituciones->links() }}
    </div>
  </div>





