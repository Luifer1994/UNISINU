<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\DepartaentosController;
use App\Http\Controllers\EspaciosController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\InstitucionesController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SedesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('livewire.home.index');
})->name('dashboard');

Route::post('/register', [RegisterController::class, 'register'])->name('registro');

//RUTA SEGURA CON AUTENTICACION Y ROL
Route::middleware(['auth:sanctum', 'verified'])->get('/paises',[PaisesController::class, 'index'])->name('paises');

//RUTA SEGURA CON AUTENTICACION Y ROL
Route::middleware(['auth:sanctum', 'verified'])->get('/departamentos',[DepartaentosController::class, 'index'])->name('departamentos');

//RUTA SEGURA CON AUTENTICACION Y ROL
Route::middleware(['auth:sanctum', 'verified'])->get('/ciudades',[CiudadesController::class, 'index'])->name('ciudades');

//RUTA SEGURA CON AUTENTICACION Y ROL
Route::middleware(['auth:sanctum', 'verified'])->get('/instituciones',[InstitucionesController::class, 'index'])->name('instituciones');

//RUTA SEGURA CON AUTENTICACION Y ROL
Route::middleware(['auth:sanctum', 'verified'])->get('/sedes',[SedesController::class, 'index'])->name('sedes');

//RUTA SEGURA CON AUTENTICACION Y ROL
Route::middleware(['auth:sanctum', 'verified'])->get('/categorias',[CategoriasController::class, 'index'])->name('categorias');

//RUTA SEGURA CON AUTENTICACION Y ROL
Route::middleware(['auth:sanctum', 'verified'])->get('/funcionarios',[FuncionariosController::class, 'index'])->name('funcionarios');

Route::middleware(['auth:sanctum', 'verified'])->get('/espacios',[EspaciosController::class, 'index'])->name('espacios');
