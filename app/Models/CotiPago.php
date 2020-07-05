<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CotiPago extends Model
{
    protected $table = 'coti_pagos';
    protected $fillable = ['usuario','imagen','monto','fecha','descripcion','estado','respuesta','cotizacion_id'];
    protected $dates = ['fecha'];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'usuario');
    }
}
