<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';
    protected $fillable = ['codigo','fecha_orden','fecha_entrega','descuento_to','total_bs','estado','user_id'];
    protected $dates = ['fecha_orden','fecha_entrega'];
	public function carrito_detalles()
    {
    	return $this->hasMany(CarritoDetalle::class);
    }
//Un carrito fue creado por un solo usuario
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

 }
