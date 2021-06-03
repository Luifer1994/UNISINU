<?php

namespace App\Http\Controllers;

use App\Models\Espacios;
use App\Models\Funcionarios;
use App\Models\Reservas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $espacio = Espacios::find($id);
        return view('reservas.index', compact('espacio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $reservas['reservas'] = Reservas::all();

        return response()->json($reservas['reservas']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
