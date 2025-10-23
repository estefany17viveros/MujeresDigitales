<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_hora_inicio',
        'fecha_hora_fin',
        'lugar',
        'localidad_id',  // <-- Agrega localidad_id al fillable
    ];

    protected $dates = [
        'fecha_hora_inicio',
        'fecha_hora_fin'
    ];

    /**
     * Relación muchos a muchos con Artista
     */
    public function artistas()
    {
        return $this->belongsToMany(Artista::class, 'artista_evento')->withTimestamps();
    }

    /**
     * Relación uno a muchos con Boleta
     */
    public function boletas()
    {
        return $this->hasMany(Boleta::class, 'evento_id');
    }

    /**
     * Relación muchos a uno con Localidad
     */
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad_id');
    }
}
