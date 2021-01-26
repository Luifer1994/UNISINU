<?php

namespace App\Http\Livewire;

use App\Models\Ciudades;
use App\Models\Departamentos;
use Livewire\Component;
use Livewire\WithPagination;

class CiudadesComponent extends Component
{
    public $id_ciudad, $nombre, $id_departamento;
    public $formulario = "register";
    public $searh = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.ciudades-component',[
            'ciudades' => Ciudades::select('ciudades.*', 'departamentos.nombre as nombreD')
            ->join('departamentos', 'ciudades.id_departamento', '=', 'departamentos.id')
            ->where('ciudades.nombre', 'LIKE', "%{$this->searh}%")
            ->orWhere('departamentos.nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')
            ->paginate(5),
            'departamentos' => Departamentos::all(),
        ]);
    }

    public function store()
    {
        // VALIDADACION DE CAMPOS VACIOS
        $this->validate([
            'nombre'          => 'required',
            'id_departamento' => 'required'
        ]);

        // CREAMOS UN NUEVA CIUDAD
        $newCiudad = Ciudades::create([
            'nombre'         =>  ucwords($this->nombre),
            'id_departamento'=> $this->id_departamento
        ]);

        $this->resetInpts();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'CIUDAD REGISTRADA CON EXITO');

        // CERRAMOS EL MODAL DE REGISTRO
        $this->emit('store');

    }

     // FUNCION QUE PREPARA EL FORMAULARIO PARA EDITAR
     public function edit($id)
     {
         // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
         $ciudad =  Ciudades::find($id);

         // LLENAMOS LOS CAMPOS DEL FORMULARIO
         $this->id_ciudad       = $ciudad->id;
         $this->nombre          = $ciudad->nombre;
         $this->id_departamento = $ciudad->id_departamento;

         $this->formulario = "edit";
     }

     public function update()
     {
         //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
         $this->validate([
             'nombre'          => 'required',
             'id_departamento' => 'required',
         ]);

         // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
         $ciudad = Ciudades::find($this->id_ciudad);
         $ciudad->update([
             'nombre'          => ucwords($this->nombre),
             'id_departamento' => $this->id_departamento,
         ]);

         // RETORNAMOS UN MENSAJE DE CONFIRMACION
         session()->flash('mensaje', 'CIUDAD ACTUALIZADA CON EXITO');

         // CERRAMOS EL MODAL
         $this->emit('store');

         // VACIAMOS LOS INPUTS DEL FORMULARIO
         $this->default();
     }

    public function resetInpts()
    {
        $this->nombre = "";
        $this->id_departamento = "";
    }

    public function default()
    {
        $this->nombre   = "";
        $this->id_departamento  = "";

        $this->formulario = "register";
    }
}
