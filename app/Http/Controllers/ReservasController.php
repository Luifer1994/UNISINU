<?php

namespace App\Http\Controllers;

use App\Models\Espacios;
use App\Models\Funcionarios;
use App\Models\Reservas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservasController extends Controller
{
    public function index($id = null){

        $espacio = Espacios::find($id);
        return view('reservas.index', compact('espacio','reservas'));
    }

    public function store(Request $request){


        $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);


       $newReserva = new Reservas();

       $user = User::find(Auth::user()->id);

       $espacio = Espacios::find($request->space);
       $funcionario = Funcionarios::find($user->id_funcionario);

       $newReserva->id_espacio  = $request->space;
       $newReserva->id_user     = Auth::user()->id;
       $newReserva->cedula_user = $funcionario->cedula;
       $newReserva->start       = $request->start;
       $newReserva->end         = $request->end;
       $newReserva->tittle      = 'Resarva de ' .$espacio->name .' por '. Auth::user()->mame;
       $newReserva->description = 'hhhkjjkljkjk';


       $newReserva->save();

    }

    public function show(Reservas $reservas)
    {
        $reservas = Reservas::all();
        return response()->json($reservas);
    }
}
