<?php

namespace App\Models;

use App\Models\ProductoFoto;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre','slug','descripcion','precio', 'descuento', 'cant_descuento', 'oferta', 'des_oferta', 'stock','estado','categoria_id'];

    //aqui consultamos la categoria de un producto
    public function categoria(){
    	//un producto pertenece a una categoria-->Relacion de muchos a uno
    	return $this->belongsTo(Categoria::class);

    //un producto tiene muchas imagenes--> Relacion de uno a muchos
    }
    //un producto tiene muchas imagenes--> Relacion de uno a muchos
    public function fotos(){
        return $this->hasMany(ProductoFoto::class);
    }

    public function getFavoritoImagenUrlAttribute()
    {
        $imgFavorito = $this->fotos()->where('favorito',true)->first();

       if(!$imgFavorito){ //En caso que la imagen no sea destacada
         $imgFavorito = $this->fotos()->first();
        }
        if($imgFavorito){
           return $imgFavorito->url;//del otro mutator que hicimos en el modelo ProductImage
        }
        return '/img/default.jpg';
    }
    //Esta es la relacion para q un producto tenga varias tallas
    public function tallas(){
        return $this->belongsToMany(Talla::class);
    }

}
