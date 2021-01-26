<?php

namespace App\Http\Livewire;

use App\Models\Paises as ModelsPaises;
use Livewire\Component;
use Livewire\WithPagination;

class Paises extends Component
{
    public $id_pais, $nombre;
    public $formulario = "register";
    public $searh = '';

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.paises',[
            'paises' => ModelsPaises::where('nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')
            ->paginate(5),
        ]);
    }

    public function store()
    {
        //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
        $this->validate([
            'nombre'  => 'required',
        ]);

        $newPais = ModelsPaises::create([
            'nombre' => ucwords($this->nombre)
        ]);

        $this->resetInpts();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'PAIS REGISTRADO CON EXITO');

        $this->emit('store');
    }

    public function edit($id)
    {
        $pais =  ModelsPaises::find($id);
        $this->id_pais = $pais->id;
        $this->nombre  = $pais->nombre;

        $this->formulario = "edit";
    }

    public function update()
    {
        $this->validate([
            'nombre'          => 'required',
        ]);

        $pais = ModelsPaises::find($this->id_pais);
        $pais->update([
            'nombre' => ucwords($this->nombre),
        ]);


        session()->flash('mensaje', 'PAIS ACTUALIZADO CON EXITO');

        $this->emit('store');

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
