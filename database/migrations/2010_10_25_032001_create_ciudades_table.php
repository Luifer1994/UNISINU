<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{

    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();
        });


        Schema::create('paises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nombre',50);
            $table->timestamps();
        });

        Schema::create('departamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nombre',50);
            $table->foreignId('id_pais')->constrained('paises');
            $table->timestamps();
        });

        Schema::create('ciudades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nombre',50);
            $table->foreignId('id_departamento')->constrained('departamentos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('paises');
        Schema::dropIfExists('departamentos');
        Schema::dropIfExists('ciudades');
    }
}
