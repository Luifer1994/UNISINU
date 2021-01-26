    <form wire:submit.prevent="store">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Nombres:</label>
            <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre">
            @error('nombre')<p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="form-group col-md-12">
            <label>Descripcion:</label>
            <textarea wire:model='descripcion' class="form-control" name="descripcion"></textarea>
            @error('descripcion')<p class="text-danger">{{ $message }}</p> @enderror
        </div>

            <div class="form-group col-md-12">
                <label>Foto:</label>
                <input type="file" class="form-control" wire:model='foto'>
                @error('foto')<p class="text-danger">{{ $message }}</p> @enderror
            </div>

        <div class="form-group col-md-6">
            <label>Sede:</label>
            <select  wire:model='id_sede'  class="form-control">
                <option value="">Seleccione...</option>
                @foreach ($sedes as $sede)
                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                @endforeach
            </select>
            @error('id_sede')<p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Categoria:</label>
            <select  wire:model='id_categoria'  class="form-control">
                <option value="">Seleccione...</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            @error('id_categoria')<p class="text-danger">{{ $message }}</p> @enderror
        </div>
    </div>
    </form>
