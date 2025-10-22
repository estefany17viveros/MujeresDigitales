<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'num_cel',
        'num_documento',
        'email',
        'contrasena',
    ];
}
