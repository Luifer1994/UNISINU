<?php

namespace App\Http\Livewire;

use App\Models\Categorias;
use App\Models\Espacios;
use App\Models\Sedes;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    public $searh = '';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.home-component', [
            'espacios' => Espacios::select('espacios.*', 'categorias.nombre as nombreC', 'sedes.nombre as nombreS')
            ->join('categorias', 'espacios.id_categoria', '=', 'categorias.id')
            ->join('sedes', 'espacios.id_sede', '=', 'sedes.id')
            ->where('espacios.nombre', 'LIKE', "%{$this->searh}%")
            ->orWhere('sedes.nombre', 'LIKE', "%{$this->searh}%")
            ->orwhere('categorias.nombre', 'LIKE', "%{$this->searh}%")
            ->orderBy('id')->paginate(6),
            'categorias' => Categorias::all(),
            'sedes' => Sedes::all(),
        ]);
    }
}
