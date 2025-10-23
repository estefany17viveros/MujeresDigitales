<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
<<<<<<< HEAD
    protected $fillable = ['nombre','descripcion','fecha_hora_inicio','fecha_hora_fin','lugar'];
=======
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_hora_inicio',
        'fecha_hora_fin',
        'lugar'
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
>>>>>>> 965daf6a2ea9b6fbdeccfe979851bccce4f38837

    /**
     * Relación uno a muchos con Boleta
     */
    public function boletas()
    {
        return $this->hasMany(Boleta::class);
    }

    public function artistas()
    {
        return $this->belongsToMany(Artista::class, 'artista_evento');
    }

    /**
     * Relación uno a muchos con Localidad
     */
    public function localidades()
    {
        return $this->hasMany(Localidad::class, 'evento_id');
    }
}
