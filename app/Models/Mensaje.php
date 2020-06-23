<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';
    protected $fillable = ['envia','recibe','contenido','cotizacion_id'];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }

    public function recibidouser()
    {
    	return $this->belongsTo(User::class, 'envia');
    }


}
