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
                <h4 class="card-title">Funcionarios</h4>
            </div>
            <div class="col-6">
                <button class="btn btn-primary pull-right btn-rounded" data-toggle="modal" data-target="#registrar">
                    <i class="fas fa-plus-circle"></i> Funcionario
                </button>
                {{-- MODAL REGISTER --}}
                @include('livewire.funcionarios.register')
            </div>
        </div>
    </div>
    <div class="card-body">
        <input wire:model='searh' class="form-control" placeholder="BUSCAR">
        <div class="card-body table-responsive">
            @if ($funcionarios->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">CEDULA</th>
                        <th scope="col">TIPO_FUNCIONARIO</th>
                        <th scope="col">ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 0;
                        @endphp
                        @foreach ($funcionarios as $funcionario)
                        @php
                            $num++;
                        @endphp
                            <tr>
                                <td>{{ $funcionario->nombre }}</td>
                                <td>{{ $funcionario->apellido }}</td>
                                <th>{{ $funcionario->cedula }}</th>
                                <th>{{ $funcionario->nombreR }}</th>
                                <td>
                                    <button title="EDITAR" wire:click='edit({{ $funcionario->id }})' data-toggle="modal" data-target="#editar" type="button" class="btn btn-sm btn-success">
                                        <i style="font-size: 20px" class="fas fa-pencil-alt"></i>
                                    </button>

                                    @include('livewire.funcionarios.edit')

                                    <button title="DETALLES" data-toggle="modal" data-target="#detalles<?=$num?>" type="button" class="btn btn-sm btn-warning">
                                        <i style="font-size: 20px" class="fas fa-eye"></i>
                                    </button>

                                    @include('livewire.funcionarios.detalles')
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
        {{ $funcionarios->links() }}
    </div>
  </div>





