<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';
    protected $fillable = ['codigo','fecha_orden','fecha_entrega','anticipo','total_bs','estado','user_id'];
    protected $dates = ['fecha_orden','fecha_entrega'];


    //Un carrito fue creado por un solo usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carrito_detalles()
    {
        return $this->hasMany(CarritoDetalle::class);
    }

    public function pagoimgcarri()
    {
        return $this->hasOne(CarritoPago::class);
    }

}
