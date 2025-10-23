<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    protected $fillable = ['evento_id','localidad_id','valor','cantidad_disponible'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
}

