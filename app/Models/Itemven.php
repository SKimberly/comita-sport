<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itemven extends Model
{
    protected $table = 'itemvens';
    protected $fillable = ['producto','cantidad'];
}
