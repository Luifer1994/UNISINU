<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitucionesController extends Controller
{
    public  function index()
    {
        if (Auth::user()->id_rol==1) {

            return view('livewire.instituciones.index');

        }
    }
}
