<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'nombre' => 'Sital Galdamez',
                'user' => 'sitalg',
                'id_nivel' => 3
            ],
            [
                'nombre' => 'Omar Parada',
                'user' => 'omarp',
                'id_nivel' => 3
            ],
            [
                'nombre' => 'Henry Chevez',
                'user' => 'henryc',
                'id_nivel' => 3
            ],
            [
                'nombre' => 'Leonardo Flores',
                'user' => 'leonardof',
                'id_nivel' => 3
            ],
            [
                'nombre' => 'Empleado',
                'user' => 'empleado1',
                'id_nivel' => 1
            ],
            [
                'nombre' => 'Gerente',
                'user' => 'gerente1',
                'id_nivel' => 2
            ]
        );
        DB::table('usuarios')->insert($data);
    }
}
