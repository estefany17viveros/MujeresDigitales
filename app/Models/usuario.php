<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'apellido',
        'num_cel',
        'num_documento',
        'contrasena',
        'email',
        'metodo_pago',
        'compra_id',
        'evento_id'
    ];

    // Ocultar cuando se serializa (ej. al devolver JSON)
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    // Si quieres que se conviertan automáticamente algunos campos
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Mutator: asegurar que la contraseña se guarde hasheada
    public function setContrasenaAttribute($value)
    {
        // Evitar doble-hasheo: si ya parece un hash de bcrypt, no volverlo a hashear.
        if ($value && \Illuminate\Support\Str::startsWith($value, '$2y$')) {
            $this->attributes['contrasena'] = $value;
        } else {
            $this->attributes['contrasena'] = bcrypt($value);
        }
    }

    // Método helper para verificar contraseña (opcional)
    public function checkPassword($plain)
    {
        return \Illuminate\Support\Facades\Hash::check($plain, $this->contrasena);
    }
}
