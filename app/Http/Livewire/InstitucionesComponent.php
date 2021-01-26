<?php

namespace App\Http\Livewire;

use App\Models\Instituciones;
use App\Models\Paises;
use Livewire\Component;
use Livewire\WithPagination;

class InstitucionesComponent extends Component
{
    public $id_institucion, $nombre, $id_pais;
    public $formulario = "register";
    public $searh = '';

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.instituciones-component',[
            'instituciones' => Instituciones::select('instituciones.*', 'paises.nombre as nombreP')
            ->join('paises', 'instituciones.id_pais', '=', 'paises.id')
            ->where('instituciones.nombre', 'LIKE', "%{$this->searh}%")
            ->orWhere('paises.nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')->paginate(5),
            'paises' => Paises::all(),
        ]);
    }

    public function store()
    {
        //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
        $this->validate([
            'nombre'   => 'required',
            'id_pais'  => 'required',
        ]);

        // CREAMOS UN NUEVO REGISTRO
        $newInstitucion = Instituciones::create([
            'nombre' => ucwords($this->nombre),
            'id_pais' => $this->id_pais,
        ]);

        // LIMPIAMOS LOS INPUTS DEL FORMULARIO
        $this->resetInpts();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'INSTITUCION REGISTRADA CON EXITO');

        // CERRAMOS EL MODAL DE REGISTRO
        $this->emit('store');
    }

    // FUNCION QUE PREPARA EL FORMAULARIO PARA EDITAR
    public function edit($id)
    {
        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $institucion =  Instituciones::find($id);

        // LLENAMOS LOS CAMPOS DEL FORMULARIO
        $this->id_institucion  = $institucion->id;
        $this->nombre          = $institucion->nombre;
        $this->id_pais         = $institucion->id_pais;

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
        $institucion = Instituciones::find($this->id_institucion);
        $institucion->update([
            'nombre'  => ucwords($this->nombre),
            'id_pais' => $this->id_pais,
        ]);

        // RETORNAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'INSTITUCION ACTUALIZADO CON EXITO');

        // CERRAMOS EL MODAL
        $this->emit('store');

        // VACIAMOS LOS INPUTS DEL FORMULARIO
        $this->default();
    }


    public function resetInpts()
    {
        $this->nombre = "";
    }

    public function default()
    {
        $this->nombre          = "";

        $this->formulario = "register";
    }
}
