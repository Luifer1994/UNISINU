<?php

namespace App\Http\Livewire;

use App\Models\Categorias;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriasComponent extends Component
{
    public $id_categoria, $nombre;
    public $formulario = "register";
    public $searh = '';

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.categorias-component',[
            'categorias' => Categorias::where('nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')->paginate(5)
        ]);
    }

    public function store()
    {
        //VALIDAMOS QUE LOS CAMPOS DEL FORMULARIO NO LLEGUEN VACIOS
        $this->validate([
            'nombre'  => 'required',
        ]);

        $newCategoria = Categorias::create([
            'nombre' => ucwords($this->nombre)
        ]);

        $this->resetInpts();

        //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'CATEGORIA REGISTRADA CON EXITO');

        $this->emit('store');
    }

    public function edit($id)
    {
        $categoria =  Categorias::find($id);
        $this->id_categoria = $categoria->id;
        $this->nombre  = $categoria->nombre;

        $this->formulario = "edit";
    }

    public function update()
    {
        $this->validate([
            'nombre'          => 'required',
        ]);

        $categoria = Categorias::find($this->id_categoria);
        $categoria->update([
            'nombre' => ucwords($this->nombre),
        ]);


        session()->flash('mensaje', 'CATEGORIA ACTUALIZADA CON EXITO');

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
