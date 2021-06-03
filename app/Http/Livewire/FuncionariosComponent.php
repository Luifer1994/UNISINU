<?php

namespace App\Http\Livewire;

use App\Models\Ciudades;
use App\Models\Funcionarios;
use App\Models\Generos;
use App\Models\Roles;
use App\Models\Sedes;
use Livewire\Component;
use Livewire\WithPagination;

class FuncionariosComponent extends Component
{
    public $id_funcionario, $id_ciudad, $id_rol, $id_sede, $id_genero, $nombre, $codigo, $cedula,
            $apellido, $telefono, $email, $direccion, $estado;


    public $formulario = "register";
    public $searh = '';

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.funcionarios-component',[
            'funcionarios' => Funcionarios::select('funcionarios.*', 'ciudades.nombre as nombreC', 'roles.nombre as nombreR')
            ->join('roles', 'funcionarios.id_rol', '=', 'roles.id')
            ->join('ciudades', 'funcionarios.id_ciudad', '=', 'ciudades.id')
            ->where('funcionarios.nombre', '    LIKE', "%{$this->searh}%")
            ->orWhere('funcionarios.apellido', 'LIKE', "%{$this->searh}%")
            ->orWhere('funcionarios.cedula',   'LIKE', "%{$this->searh}%")
            ->orWhere('funcionarios.codigo',   'LIKE', "%{$this->searh}%")
            ->orWhere('roles.nombre',          'LIKE', "%{$this->searh}%")
            ->orderBy('id')->paginate(5),
            'ciudades' => Ciudades::all(),
            'roles'    => Roles::all(),
            'sedes'    => Sedes::all(),
            'generos'  => Generos::all(),
        ]);
    }

    public function store()
    {
        // VALIDADACION DE CAMPOS VACIOS
        $this->validate([
            'cedula'        => 'required|numeric',
            'codigo'        => 'required|numeric',
            'nombre'        => 'required',
            'apellido'      => 'required',
            'telefono'      => 'required',
            'email'         => 'required|email',
            'direccion'     => 'required',
            'id_ciudad'     => 'required',
            'id_rol'        => 'required',
            'id_genero'     => 'required',
            'id_sede'        => 'required',
        ]);

        // CREAMOS UN NUEVO FUNCIONARIO
        $newFuncionario = Funcionarios::create([
            'cedula'    => $this->cedula,
            'codigo'    => $this->codigo,
            'nombre'    => ucwords($this->nombre),
            'apellido'  => ucwords($this->apellido),
            'telefono'  => $this->telefono,
            'email'     => $this->email,
            'direccion' => $this->direccion,
            'id_ciudad' => $this->id_ciudad,
            'id_rol'    => $this->id_rol,
            'id_genero' => $this->id_genero,
            'id_sede' => $this->id_sede,
            'estado'    => 1,
        ]);

        $this->resetInpts();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'FUNCIONARIO REGISTRADO CON EXITO');

        // CERRAMOS EL MODAL DE REGISTRO
        $this->emit('store');

    }

    // FUNCION QUE PREPARA EL FORMAULARIO PARA EDITAR
    public function edit($id)
    {
        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $funcionario =  Funcionarios::find($id);

        // LLENAMOS LOS CAMPOS DEL FORMULARIO
        $this->id_funcionario  = $funcionario->id;
        $this->cedula          = $funcionario->cedula;
        $this->codigo          = $funcionario->codigo;
        $this->nombre          = $funcionario->nombre;
        $this->apellido        = $funcionario->apellido;
        $this->telefono        = $funcionario->telefono;
        $this->email           = $funcionario->email;
        $this->direccion       = $funcionario->direccion;
        $this->id_ciudad       = $funcionario->id_ciudad;
        $this->id_rol          = $funcionario->id_rol;
        $this->id_genero       = $funcionario->id_genero;
        $this->id_sede         = $funcionario->id_sede;

        $this->formulario = "edit";
    }

    public function update()
    {
        //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
        $this->validate([
            'cedula'        => 'required|numeric',
            'codigo'        => 'required|numeric',
            'nombre'        => 'required',
            'apellido'      => 'required',
            'telefono'      => 'required',
            'email'         => 'required|email',
            'direccion'     => 'required',
            'id_ciudad'     => 'required',
            'id_rol'        => 'required',
            'id_genero'     => 'required',
            'id_sede'       => 'required',
        ]);

        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $funcionario = Funcionarios::find($this->id_funcionario);
        $funcionario->update([
            'cedula'    => $this->cedula,
            'codigo'    => $this->codigo,
            'nombre'    => ucwords($this->nombre),
            'apellido'  => ucwords($this->apellido),
            'telefono'  => $this->telefono,
            'email'     => ucwords($this->email),
            'direccion' => $this->direccion,
            'id_ciudad' => $this->id_ciudad,
            'id_rol'    => $this->id_rol,
            'id_sede'   => $this->id_sede,
            'id_genero' => $this->id_genero,
        ]);

        // RETORNAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'FUNCIONARIO ACTUALIZADO CON EXITO');

        // CERRAMOS EL MODAL
        $this->emit('store');

        // VACIAMOS LOS INPUTS DEL FORMULARIO
        $this->default();
    }


    public function resetInpts()
    {
        $this->cedula = "";
        $this->codigo = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->telefono = "";
        $this->email = "";
        $this->direccion = "";
        $this->id_ciudad = "";
        $this->id_rol = "";
        $this->id_sede = "";
        $this->id_genero = "";
    }

    public function default()
    {
        $this->cedula = "";
        $this->codigo = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->telefono = "";
        $this->email = "";
        $this->direccion = "";
        $this->id_ciudad = "";
        $this->id_rol = "";
        $this->id_sede = "";
        $this->id_genero = "";

        $this->formulario = "register";
    }
}
