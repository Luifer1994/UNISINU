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
<h2>ESPACIOS UNISINU</h2>
<div class="form-row">
    <div class="form-group col-md-2">
        <select wire:model='searh' name="searh" class="form-control form-control-sm">
            <option value="">Todos los espacios</option>
            <option value="deportes">Deportes</option>
            <option value="tecnologia">Tecnologia</option>
            <option value="eventos">Eventos</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <input wire:model='searh' type="text" class="form-control form-control-sm" placeholder="Buscar">
    </div>
</div>
<div class="form-row">
    @foreach ($espacios as $espacio)
        <div class="form-group col-md-4">
            <div class="card p-0">
                <div class="text-center">
                    <img class="img-fluid" alt="Responsive image" src="{{ asset('storage/'.$espacio->foto) }}">
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h3>{{ $espacio->nombre }}</h3>
                    </div>
                    <p>{{ $espacio->descripcion }}</p>
                    <a href="{{ route('reservas.index',$espacio->id) }}" class="btn btn-primary btn-sm btn-block">Ver disponibilidad</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $espacios->links() }}


