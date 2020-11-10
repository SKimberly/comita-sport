<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';
    protected $fillable = ['user_id','envia','recibe','contenido','cotizacion_id'];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }


}
