<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = ['nombre', 'descripcion', 'fecha_hora_inicio', 'fecha_hora_fin', 'lugar'];

    protected $dates = ['fecha_hora_inicio', 'fecha_hora_fin'];

    public function artistas()
    {
        return $this->belongsToMany(Artista::class, 'artista_evento')->withTimestamps();
    }

    public function boletas()
    {
        return $this->hasMany(Boleta::class, 'evento_id');
    }
}
