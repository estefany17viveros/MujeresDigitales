<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id',
        'localidad_id',
        'valor',
        'cantidad',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
}
