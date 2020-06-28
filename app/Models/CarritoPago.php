<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoPago extends Model
{
    protected $table = 'carrito_pagos';
    protected $fillable = ['usuario','imagen','monto','fecha','descripcion','estado','carrito_id'];
    protected $dates = ['fecha'];


    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }
}
