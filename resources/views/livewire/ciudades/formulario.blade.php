<div class="form-row">
    <div class="form-group col-md-12">
        <label>Nombre:</label>
        <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre">
        @error('nombre')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-12">
        <label>Pais:</label>
        <select name="id_departamento" wire:model='id_departamento' class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
            @endforeach
        </select>
        @error('id_departamento')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>
