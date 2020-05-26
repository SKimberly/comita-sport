<?php

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class CateproTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = factory(Categoria::class, 5)->create();
        $categoria->each(function($cate){
            $productos = factory(Producto::class, 10)->create();
            $cate->productos()->saveMany($productos); //saveMany-->guardar de uno a muchos
        });
    }
}
