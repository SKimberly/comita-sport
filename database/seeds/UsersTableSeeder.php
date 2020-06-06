<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        $suadmin->slug = Str::of('Silvana Marquina')->slug('-');
        $suadmin->cedula = '12345678';
        $suadmin->telefono = '78630742';
        $suadmin->tipo = 'Super-Admin';
        $suadmin->email = 'kimi.uatf@gmail.com';
        $suadmin->password = bcrypt('secret');
        $suadmin->save();

        $administrador = new User;
        $administrador->fullname = 'Emilio Salas';
        $administrador->slug = Str::of('Emilio Salas')->slug('-');
        $administrador->cedula = '87654321';
        $administrador->telefono = '70462939';
        $administrador->tipo = 'Administrador';
        $administrador->email = 'sport.lacomita19@gmail.com';
        $administrador->password = bcrypt('secret');
        $administrador->save();

        $ventas = new User;
        $ventas->fullname = 'Karen Vendedora';
        $ventas->slug = Str::of('Karen Vendedora')->slug('-');
        $ventas->cedula = '87654311';
        $ventas->telefono = '70001111';
        $ventas->tipo = 'Ventas';
        $ventas->email = 'venta.lacomita@gmail.com';
        $ventas->password = bcrypt('secret');
        $ventas->save();

        $cliente = new User;
        $cliente->fullname = 'Juan Cliente';
        $cliente->slug = Str::of('Juan Cliente')->slug('-');
        $cliente->cedula = '87654322';
        $cliente->telefono = '70055111';
        $cliente->tipo = 'Cliente';
        $cliente->email = 'juan.cliente@gmail.com';
        $cliente->password = bcrypt('secret');
        $cliente->save();

        $cliente2 = new User;
        $cliente2->fullname = 'Carla Cliente';
        $cliente2->slug = Str::of('Carla Cliente')->slug('-');
        $cliente2->cedula = '87654300';
        $cliente2->telefono = '70050011';
        $cliente2->tipo = 'Cliente';
        $cliente2->email = 'kimi.uatf1@gmail.com';
        $cliente2->password = bcrypt('secret');
        $cliente2->save();
    }
}
