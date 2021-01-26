<?php

namespace App\Http\Livewire;

use App\Models\Categorias;
use App\Models\Espacios;
use App\Models\Sedes;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EspaciosComponent extends Component
{
    public $id_espacio, $descripcion, $nombre, $id_categoria, $foto, $id_sede;
    public $formulario = "register";
    public $searh = '';

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.espacios-component', [
            'espacios' => Espacios::select('espacios.*', 'categorias.nombre as nombreC', 'sedes.nombre as nombreS')
            ->join('categorias', 'espacios.id_categoria', '=', 'categorias.id')
            ->join('sedes', 'espacios.id_sede', '=', 'sedes.id')
            ->where('espacios.nombre', 'LIKE', "%{$this->searh}%")
            ->orWhere('sedes.nombre', 'LIKE', "%{$this->searh}%")
            ->orwhere('categorias.nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')->paginate(5),
            'categorias' => Categorias::all(),
            'sedes' => Sedes::all(),
        ]);
    }


    public function store()
    {
        //FORMATOS DE IMAGENES SOPRTADOS
        $reglas = array('image' => 'mimes:jpeg, jpg, raw,png');
        // VALIDADACION DE CAMPOS VACIOS
        $this->validate([
            'nombre'        => 'required',
            'id_sede'       => 'required',
            'id_categoria'  => 'required',
            'descripcion'   => 'required',
            'foto'          => $reglas,
        ]);
        //GUARDAR FOTO
        $filename = $this->foto->store('fotos/espacios/'.$this->nombre,'public');
        // CREAMOS UN NUEVO DEPARTAMENTO
        $newEspacio = Espacios::create([
            'nombre'        => ucwords($this->nombre),
            'descripcion'   => ucfirst($this->descripcion),
            'id_sede'       => $this->id_sede,
            'id_categoria'  => $this->id_categoria,
            'foto'          => $filename,
        ]);

        $this->resetInpts();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'ESPACIO REGISTRADO CON EXITO');
        // CERRAMOS EL MODAL DE REGISTRO
        $this->emit('store');
    }

    // FUNCION QUE PREPARA EL FORMAULARIO PARA EDITAR
    public function edit($id)
    {
        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $espacio =  Espacios::find($id);

        // LLENAMOS LOS CAMPOS DEL FORMULARIO
        $this->id_espacio      = $espacio->id;
        $this->nombre          = $espacio->nombre;
        $this->descripcion     = $espacio->descripcion;
        $this->id_categoria    = $espacio->id_categoria;
        $this->id_sede         = $espacio->id_sede;
        $this->foto            = $espacio->foto;


        $this->formulario = "edit";
    }

    public function update()
    {
         //FORMATOS DE IMAGENES SOPRTADOS
         $reglas = array('image' => 'mimes:jpeg, jpg, raw,png');
         // VALIDADACION DE CAMPOS VACIOS
         $this->validate([
             'nombre'        => 'required',
             'id_sede'       => 'required',
             'id_categoria'  => 'required',
             'descripcion'   => 'required',
         ]);



        // INSTANCIAMOS EL REGISTRO QUE VAMOS A ACTUALIZAR
        $espacio = Espacios::find($this->id_espacio);
        $espacio->update([
            'nombre'        => ucwords($this->nombre),
            'descripcion'   => ucfirst($this->descripcion),
            'id_sede'       => $this->id_sede,
            'id_categoria'  => $this->id_categoria,
        ]);

        // RETORNAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'ESPACIO ACTUALIZADO CON EXITO');

        // CERRAMOS EL MODAL
        $this->emit('store');

        // VACIAMOS LOS INPUTS DEL FORMULARIO
        $this->default();
    }


    public function resetInpts()
    {
        $this->nombre = "";
        $this->descripcion = "";
        $this->foto = "";
        $this->id_categoria = "";
        $this->id_sede = "";
        $this->foto = "";
    }

    public function default()
    {
        $this->nombre = "";
        $this->descripcion = "";
        $this->foto = "";
        $this->id_categoria = "";
        $this->id_sede = "";
        $this->foto = "";
        $this->formulario = "register";
    }
}
