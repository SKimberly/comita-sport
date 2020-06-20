<?php

use App\Models\Categoria;
use App\Models\Material;
use App\Models\Producto;
use App\Models\ProductoFoto;
use App\Models\Talla;
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
        factory(Material::class, 30)->create();

        $categoria = factory(Categoria::class, 5)->create();
        $categoria->each(function($cate){
            $productos = factory(Producto::class, 10)->create();
            $cate->productos()->saveMany($productos); //saveMany-->guardar de uno a muchos

            $productos->each(function($fot){
                $fotos = factory(ProductoFoto::class, 4)->create();
                $tallas = factory(Talla::class, 3)->create();
                $fot->fotos()->saveMany($fotos);
                $fot->tallas()->saveMany($tallas);
            });
        });
    }
}
