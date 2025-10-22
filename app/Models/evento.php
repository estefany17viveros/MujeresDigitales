<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'lugar',
        'artista_id',
        'localidad_id',
    ];

    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
}
