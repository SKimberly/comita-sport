<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CarritoPago extends Model
{
    protected $table = 'carrito_pagos';
    protected $fillable = ['usuario','imagen','monto','fecha','descripcion','estado','respuesta','carrito_id'];
    protected $dates = ['fecha'];


    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'usuario');
    }

}
