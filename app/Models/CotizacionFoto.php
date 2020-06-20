<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CotizacionFoto extends Model
{
	protected $table = 'cotizacion_fotos';
    protected $fillable = ['imagen','cotizacion_id'];

    public function cotizacion(){
        return $this->belongsTo(Cotizacion::class);
    }
}
