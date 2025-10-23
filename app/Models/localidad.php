<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    // Nombre de la tabla correcto
    protected $table = 'localidades';

    protected $fillable = ['nombre'];
}
