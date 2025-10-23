<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['nombre','descripcion','fecha_hora_inicio','fecha_hora_fin','lugar'];

    public function boletas()
    {
        return $this->hasMany(Boleta::class);
    }

    public function artistas()
    {
        return $this->belongsToMany(Artista::class, 'artista_evento');
    }
}
