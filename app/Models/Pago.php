<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $fillable = ['imagen','monto', 'fecha','descripcion','estado','user_id'];
    protected $dates = ['fecha'];
}
public function user()
    {
    	return $this->belongsTo(User::class);
    }
