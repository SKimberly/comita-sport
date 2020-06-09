<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ProductoFoto extends Model
{
    protected $table = 'producto_fotos';
    protected $fillable = ['imagen','favorito','producto_id'];
    //a q producto le pertenece esta foto--> Relacion de muchos a uno
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    // Accesor ----- con url  getXAttibute()
    /*public function getUrlAttribute()
    {
        if(substr($this->imagen, 0, 4) === "http"){
            return $this->imagen;
        }
        return '/img/productos/'.$this->imagen;
    }*/
}