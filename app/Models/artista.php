<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $fillable = ['nombres','apellidos','genero','ciudad_natal'];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'artista_evento');
    }
}
