<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{
    protected $table = 'carrito_detalles';
    protected $fillable = ['cantidad','producto_precio','descuento_pro','subtotal_bs','producto_id','carrito_id'];

     public function producto()
    {
        return $this->hasOne(Producto::class);
    }
}
