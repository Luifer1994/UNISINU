<?php

namespace App\Http\Livewire;

use App\Models\Departamentos;
use App\Models\Paises;
use Livewire\Component;
use Livewire\WithPagination;

class DepartamentosComponent extends Component
{
    public $id_departamento, $id_pais, $nombre;
    public $formulario = "register";
    public $searh = '';

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.departamentos-component',[
            'departamentos' => Departamentos::select('departamentos.*', 'paises.nombre as nombreP')
            ->where('departamentos.nombre', 'LIKE', "%{$this->searh}%")
            ->orWhere('paises.nombre','LIKE', "%{$this->searh}%")
            ->join('paises', 'departamentos.id_pais', '=', 'paises.id')
            ->orderBy('id')
            ->paginate(5),
            'paises' => Paises::all(),
        ]);
    }

    public function store()
    {
        // VALIDADACION DE CAMPOS VACIOS
        $this->validate([
            'nombre'  => 'required',
            'id_pais' => 'required'
        ]);

        // CREAMOS UN NUEVO DEPARTAMENTO
        $newDepartamento = Departamentos::create([
            'nombre' => ucwords($this->nombre),
            'id_pais'=> $this->id_pais
        ]);

        $this->resetInpts();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'DEPARTAMENTO REGISTRADO CON EXITO');

        // CERRAMOS EL MODAL DE REGISTRO
        $this->emit('store');

    }

    // FUNCION QUE PREPARA EL FORMAULARIO PARA EDITAR
    public function edit($id)
    {
        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $departamento =  Departamentos::find($id);

        // LLENAMOS LOS CAMPOS DEL FORMULARIO
        $this->id_departamento = $departamento->id;
        $this->nombre          = $departamento->nombre;
        $this->id_pais         = $departamento->id_pais;

        $this->formulario = "edit";
    }

    public function update()
    {
        //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
        $this->validate([
            'nombre' => 'required',
            'id_pais' => 'required',
        ]);

        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $departamento = Departamentos::find($this->id_departamento);
        $departamento->update([
            'nombre'  => ucwords($this->nombre),
            'id_pais' => $this->id_pais,
        ]);

        // RETORNAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'DEPARTAMENTO ACTUALIZADO CON EXITO');

        // CERRAMOS EL MODAL
        $this->emit('store');

        // VACIAMOS LOS INPUTS DEL FORMULARIO
        $this->default();
    }


    public function resetInpts()
    {
        $this->nombre = "";
        $this->id_pais = "";
    }

    public function default()
    {
        $this->nombre   = "";
        $this->id_pais  = "";

        $this->formulario = "register";
    }
}
