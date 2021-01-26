<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //ROLES
         DB::table('roles')->insert([
            'nombre' => 'Bienestar',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Docente',
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Estudiante',
        ]);


        //PAISES
        DB::table('paises')->insert([
            'nombre' => 'Colombia',
        ]);

        //DEPARTAMENTOS
        DB::table('departamentos')->insert([
            'nombre' => 'Bolivar',
            'id_pais' => 1,
        ]);

        //CIUDADES
        DB::table('ciudades')->insert([
            'nombre' => 'Cartagena',
            'id_departamento' => 1,
        ]);

        //GENEROS
        DB::table('generos')->insert([
            'nombre' => 'Masculino',
        ]);
        DB::table('generos')->insert([
            'nombre' => 'Femenino',
        ]);
        DB::table('generos')->insert([
            'nombre' => 'Otro',
        ]);

        //INSTITUCION
        DB::table('instituciones')->insert([
            'nombre' => 'Universidad del sinu',
            'id_pais' => 1,
        ]);

        //SEDES
        DB::table('sedes')->insert([
            'nombre' => 'Plaza colon',
            'direccion' => ' Av. El Bosque, transv. 54 N° 30 – 729',
            'id_ciudad' => 1,
            'id_institucion' => 1,
        ]);

        //FUNCIONARIO
        DB::table('funcionarios')->insert([
            'cedula' => 12345,
            'nombre' => 'Admin',
            'apellido' => 'Bienestar',
            'codigo' => 12345,
            'telefono' => 12345,
            'email' => 'admin@email.com',
            'id_genero' => 1,
            'direccion' => ' Av. El Bosque, transv. 54 N° 30 – 729',
            'id_ciudad' => 1,
            'id_sede' => 1,
            'id_rol' => 1,
            'estado' => 1,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
