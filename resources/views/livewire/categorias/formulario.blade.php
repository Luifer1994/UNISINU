<div class="form-row">
    <div class="form-group col-md-12">
        <label>Nombre:</label>
        <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre">
        @error('nombre')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>
