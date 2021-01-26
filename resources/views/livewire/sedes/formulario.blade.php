<div class="form-row">
    <div class="form-group col-md-12">
        <label>Nombre:</label>
        <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre">
        @error('nombre')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-12">
        <label>Direccion:</label>
        <input wire:model='direccion' type="text" class="form-control" placeholder="Direccion">
        @error('direccion')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Ciudad:</label>
        <select  wire:model='id_ciudad'  class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($ciudades as $ciudad)
                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
            @endforeach
        </select>
        @error('id_ciudad')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Institucion:</label>
        <select  wire:model='id_institucion' class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($instituciones as $institucion)
                <option value="{{ $institucion->id }}">{{ $institucion->nombre }}</option>
            @endforeach
        </select>
        @error('id_institucion')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>
