<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
	protected $table = 'materiales';
    protected $fillable = ['id','nombre','slug','descripcion'];
}

