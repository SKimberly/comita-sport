<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suadmin = new User;
        $suadmin->fullname = 'Silvana Marquina';
        $suadmin->cedula = '12345678';
        $suadmin->telefono = '78630742';
        $suadmin->tipo = 'Super-Admin';
        $suadmin->email = 'kimi.uatf@gmail.com';
        $suadmin->password = bcrypt('secret');
        $suadmin->save();

        $administrador = new User;
        $administrador->fullname = 'Emilio Salas';
        $administrador->cedula = '87654321';
        $administrador->telefono = '70462939';
        $administrador->tipo = 'Administrador';
        $administrador->email = 'sport.lacomita19@gmail.com';
        $administrador->password = bcrypt('secret');
        $administrador->save();

        $ventas = new User;
        $ventas->fullname = 'Karen Vendedora';
        $ventas->cedula = '87654311';
        $ventas->telefono = '70001111';
        $ventas->tipo = 'Ventas';
        $ventas->email = 'venta.lacomita@gmail.com';
        $ventas->password = bcrypt('secret');
        $ventas->save();

        $cliente = new User;
        $cliente->fullname = 'Juan Cliente';
        $cliente->cedula = '87654322';
        $cliente->telefono = '70055111';
        $cliente->tipo = 'Cliente';
        $cliente->email = 'juan.cliente@gmail.com';
        $cliente->password = bcrypt('secret');
        $cliente->save();

        $cliente2 = new User;
        $cliente2->fullname = 'Carla Cliente';
        $cliente2->cedula = '87654300';
        $cliente2->telefono = '70050011';
        $cliente2->tipo = 'Cliente';
        $cliente2->email = 'kimi.uatf1@gmail.com';
        $cliente2->password = bcrypt('secret');
        $cliente2->save();
    }
}
