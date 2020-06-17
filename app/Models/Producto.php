<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre','slug','codigo','descripcion','precio','descuento','cant_descuento','oferta','stock','estado','categoria_id'];

    // Aqui consultamos la categoria de un producto
    public function categoria(){
        // Un producto pertenece a una categoria-->Relacion de muchos a una(Categoria)
        return $this->belongsTo(Categoria::class);
    }

    //un producto tiene muchas imagenes--> Relacion de uno a muchos
    public function fotos(){
        return $this->hasMany(ProductoFoto::class);
    }

    //Accesor para imagen por defecto
    public function getDetalleImagenUrlAttribute()
    {
        $imgUno = $this->fotos()->first();

        if($imgUno){
            return $imgUno->imagen;//del otro mutator que hicimos en el modelo ProductImage
        }
        return '/img/productos/default.jpg';
    }


    //Accesor para imagen por defecto
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
    public function tallas()
    {
        return $this->belongsToMany(Talla::class);
    }

    public function carrito_detalle()
    {
        return $this->belongsTo(CarritoDetalle::class);
    }

}
