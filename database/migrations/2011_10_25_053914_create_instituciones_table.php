<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionesTable extends Migration
{

    public function up()
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nombre',100);
            $table->foreignId('id_pais')->constrained('paises');
            $table->timestamps();
        });

        Schema::create('sedes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nombre', 120);
            $table->char('direccion', 120);
            $table->foreignId('id_institucion')->constrained('instituciones');
            $table->foreignId('id_ciudad')->constrained('ciudades');
            $table->timestamps();
        });

        Schema::create('generos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nombre',40);
            $table->timestamps();
        });

        Schema::create('estado_funcionarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula',20);
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('codigo',20);
            $table->foreignId('id_genero')->constrained('generos');
            $table->string('telefono',20);
            $table->string('email',100);
            $table->string('direccion',120);
            $table->foreignId('id_sede')->constrained('sedes');
            $table->foreignId('id_ciudad')->constrained('ciudades');
            $table->foreignId('id_rol')->constrained('roles');
            $table->integer('estado');
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nombre', 100);
            $table->timestamps();
        });

        Schema::create('espacios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('foto');
            $table->char('nombre',100);
            $table->string('descripcion',200);
            $table->foreignId('id_sede')->constrained('sedes');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('codigo',20);
            $table->string('name',100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('id_funcionario')->constrained('funcionarios');
            $table->integer('id_rol');
            $table->integer('id_genero');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_espacio')->constrained('espacios');
            $table->foreignId('id_user')->constrained('users');
            $table->char('cedula_user',20);
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->char('estado',1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instituciones');
        Schema::dropIfExists('sedes');
        Schema::dropIfExists('generos');
        Schema::dropIfExists('funcionarios');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('espacios');
        Schema::dropIfExists('users');
        Schema::dropIfExists('reservas');
    }
}
