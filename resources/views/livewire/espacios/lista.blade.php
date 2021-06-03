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
                <h4 class="card-title">Espacios</h4>
            </div>
            <div class="col-6">
                <button class="btn btn-primary pull-right btn-rounded" data-toggle="modal" data-target="#registrar">
                    <i class="fas fa-plus-circle"></i> Espacio
                </button>
                {{-- MODAL REGISTER --}}
                @include('livewire.espacios.register')
            </div>
        </div>
    </div>

    <div class="card-body">
        <input wire:model='searh' class="form-control" placeholder="BUSCAR">
        <div class="card-body table-responsive">
            @if ($espacios->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">SEDE</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 0;
                        @endphp
                        @foreach ($espacios as $espacio)
                        @php
                            $num++;
                        @endphp
                            <tr>
                                <td>{{ $espacio->nombre }}</td>
                                <td>{{ $espacio->nombreS }}</td>
                                <td>{{ $espacio->nombreC }}</td>
                                <td>
                                    <button title="EDITAR" wire:click='edit({{ $espacio->id }})' data-toggle="modal" data-target="#editar" type="button" class="btn btn-sm btn-success">
                                        <i style="font-size: 20px" class="fas fa-pencil-alt"></i>
                                    </button>

                                    @include('livewire.espacios.edit')

                                    <button title="DETALLES" data-toggle="modal" data-target="#detalles<?=$num?>" type="button" class="btn btn-sm btn-warning">
                                        <i style="font-size: 20px" class="fas fa-eye"></i>
                                    </button>

                                    @include('livewire.espacios.detalles')
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
        {{ $espacios->links() }}
    </div>
  </div>






