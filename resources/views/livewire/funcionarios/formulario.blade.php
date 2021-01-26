<div class="form-row">
    <div class="form-group col-md-6">
        <label>Cedula:</label>
        <input wire:model='cedula' type="text" class="form-control" placeholder="Cedula">
        @error('cedula')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Codigo Institucional:</label>
        <input wire:model='codigo' type="text" class="form-control" placeholder="Codigo">
        @error('codigo')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Nombres:</label>
        <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre">
        @error('nombre')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Apellidos:</label>
        <input wire:model='apellido' type="text" class="form-control" placeholder="Apellidos">
        @error('apellido')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Gnero:</label>
        <select  wire:model='id_genero'  class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
            @endforeach
        </select>
        @error('id_genero')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Telefono:</label>
        <input wire:model='telefono' type="text" class="form-control" placeholder="Telefono">
        @error('telefono')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Correo:</label>
        <input wire:model='email' type="email" class="form-control" placeholder="Correo">
        @error('email')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group col-md-6">
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
        <label>Tipo de Funcionarios:</label>
        <select  wire:model='id_rol' class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($roles as $rol)
                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
            @endforeach
        </select>
        @error('id_rol')<p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>
