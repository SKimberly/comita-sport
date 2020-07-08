<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportetipo extends Model
{
    protected $table = 'reportetipos';
    protected $fillable = [ 'precio','descuento','cant_descuento','cantidad','producto_precio','subtotal_bs','categoria_id'];



}
