<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';
    protected $fillable = ['nombre','slug','codigo','cantidad','descripcion','descuento','precio', 'estado'];

    public function fotos(){
        return $this->hasMany(CotizacionFoto::class);
    }
    //Accesor para imagen por defecto
    public function getFotoImagenAttribute()
    {
        $imgUno = $this->fotos()->first();

        if($imgUno){
            return $imgUno->imagen;//del otro mutator que hicimos en el modelo ProductImage
        }
        return '/img/cotizaciones/default.jpg';
    }
    public function tallas()
    {
        return $this->belongsToMany(Talla::class);
    }
    public function materiales()
    {
        return $this->belongsToMany(Material::class);
    }


}
