<?php

namespace App\Http\Controllers;

use App\Mail\PasswordUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'cedula' => 'required',
            'codigo' => 'required',
            'password' => 'required'
        ]);


        if ($funcionarios = DB::table('funcionarios')->where('cedula', '=', $request->cedula)->get())
        {

            foreach ($funcionarios as $funcionario)
            {
                if ($funcionario->codigo == $request->codigo) {
                    $newUsuario = new User();

                    $newUsuario->codigo = $funcionario->codigo;
                    $newUsuario->name   = $funcionario->nombre;
                    $newUsuario->email  = $funcionario->email;
                    $newUsuario->password  = Hash::make($request->password);
                    $newUsuario->id_rol    = $funcionario->id_rol;
                    $newUsuario->id_genero = $funcionario->id_genero;
                    $newUsuario->id_funcionario = $funcionario->id;
                    $newUsuario->save();

                    return back()->with('mensaje', 'Usuario registrado con exito');
                }
                else
                {
                    return back()->with('mensaje2', 'El codigo ingresado no coinside con el del funcionario');
                }

            }
        }

        return back()->with('mensaje2', 'Usted no hace parte de la familia UNISINU');


    }
}
