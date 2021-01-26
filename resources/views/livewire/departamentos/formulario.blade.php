<div class="form-row">
    <div class="form-group col-md-12">
        <label>Nombre:</label>
        <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre">
        @error('nombre')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-12">
        <label>Pais:</label>
        <select name="id_pais" wire:model='id_pais' class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($paises as $pais)
                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
            @endforeach
        </select>
        @error('id_pais')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>
