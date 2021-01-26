<?php

namespace App\Http\Livewire;

use App\Models\Ciudades;
use App\Models\Instituciones;
use App\Models\Sedes;
use Livewire\Component;
use Livewire\WithPagination;

class SedesComponent extends Component
{
    public $id_sede, $id_ciudad, $id_institucion, $nombre, $direccion;
    public $searh = "";
    public $formulario = "register";

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.sedes-component',[
            'sedes' => Sedes::select('sedes.*', 'instituciones.nombre as nombreI')
            ->join('instituciones', 'sedes.id_institucion', '=', 'instituciones.id')
            ->where('sedes.nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')
            ->paginate(5),
            'instituciones' => Instituciones::all(),
            'ciudades'      => Ciudades::all(),
        ]);
    }

    public function store()
    {
        //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
        $this->validate([
            'nombre'          => 'required',
            'direccion'       => 'required',
            'id_ciudad'       => 'required',
            'id_institucion'  => 'required',
        ]);

        // CREAMOS UN NUEVO REGISTRO
        $newSede = Sedes::create([
            'nombre'           => ucwords($this->nombre),
            'direccion'        => $this->direccion,
            'id_ciudad'        => $this->id_ciudad,
            'id_institucion'   => $this->id_institucion,
        ]);

        // LIMPIAMOS LOS INPUTS DEL FORMULARIO
        $this->resetInpts();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'SEDE  REGISTRADA CON EXITO');

        // CERRAMOS EL MODAL DE REGISTRO
        $this->emit('store');
    }

    // FUNCION QUE PREPARA EL FORMAULARIO PARA EDITAR
    public function edit($id)
    {
        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $sede =  Sedes::find($id);

        // LLENAMOS LOS CAMPOS DEL FORMULARIO
        $this->id_sede         = $sede->id;
        $this->nombre          = $sede->nombre;
        $this->direccion       = $sede->direccion;
        $this->id_ciudad       = $sede->id_ciudad;
        $this->id_institucion  = $sede->id_institucion;

        $this->formulario = "edit";
    }

    public function update()
    {
        //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
        $this->validate([
            'nombre'         => 'required',
            'direccion'      => 'required',
            'id_ciudad'      => 'required',
            'id_institucion' => 'required',
        ]);

        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $sede = Sedes::find($this->id_sede);
        $sede->update([
            'nombre'            => ucwords($this->nombre),
            'direccion'         => $this->direccion,
            'id_ciudad'         => $this->id_ciudad,
            'id_institucion'    => $this->id_institucion,
        ]);

        // RETORNAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'SEDE ACTUALIZADA CON EXITO');

        // CERRAMOS EL MODAL
        $this->emit('store');

        // VACIAMOS LOS INPUTS DEL FORMULARIO
        $this->default();
    }


    public function resetInpts()
    {
        $this->nombre = "";
        $this->direccion = "";
        $this->id_ciudad = "";
        $this->id_institucion = "";
    }

    public function default()
    {
        $this->nombre          = "";
        $this->direccion = "";
        $this->id_ciudad = "";
        $this->id_institucion = "";

        $this->formulario = "register";
    }

}
