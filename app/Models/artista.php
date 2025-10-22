<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $table = 'artistas';

    protected $fillable = ['nombres', 'apellidos', 'genero', 'ciudad_natal'];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'artista_evento')->withTimestamps();
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }
}
