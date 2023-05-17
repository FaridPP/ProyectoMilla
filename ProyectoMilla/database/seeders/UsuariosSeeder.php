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
                'name' => 'Sital Galdamez',
                'email' => 'sital@correo.com',
                'role' => 'Admin',
                'password' => '123456'
            ],
            [
                'name' => 'Omar Parada',
                'email' => 'omar@correo.com',
                'role' => 'Admin',
                'password'=> '123456'
            ],
            [
                'name' => 'Henry Chevez',
                'email' => 'henry@correo.com',
                'role' => 'Admin',
                'password'=> '123456'
            ],
            [
                'name' => 'Leonardo Flores',
                'email' => 'leonardo@correo.com',
                'role' => 'Admin',
                'password'=> '123456'
            ],
            [
                'name' => 'Empleado',
                'email' => 'empleado@correo.com',
                'role' => 'basico',
                'password'=> '123456'
            ],
            [
                'name' => 'Gerente',
                'email' => 'gerente@correo.com',
                'role' => 'gerente',
                'password'=> '123654'
            ]
        );
        DB::table('users')->insert($data);
    }
}
