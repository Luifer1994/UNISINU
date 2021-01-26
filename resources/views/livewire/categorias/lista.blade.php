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
                <h4 class="card-title">Categorias</h4>
            </div>
            <div class="col-6">
                <button class="btn btn-primary pull-right btn-rounded" data-toggle="modal" data-target="#registrar">
                    <i class="fas fa-plus-circle"></i> Categoria
                </button>
                {{-- MODAL REGISTER --}}
                @include('livewire.categorias.register')
            </div>
        </div>
    </div>
    <div class="card-body">
        <input wire:model='searh' class="form-control" placeholder="BUSCAR">
        <div class="card-body table-responsive">
            @if ($categorias->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <th>{{ $categoria->id }}</th>
                                <td>{{ $categoria->nombre }}</td>
                                <td width="30px">
                                    <button wire:click='edit({{ $categoria->id }})' data-toggle="modal" data-target="#editar" type="button" class="btn btn-sm btn-success">
                                        <i style="font-size: 20px" class="fas fa-pencil-alt"></i>
                                    </button>

                                    @include('livewire.categorias.edit')
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
        {{ $categorias->links() }}
    </div>
  </div>





