<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'user_id','boleta_id','documento','cantidad','valor_total','metodo_pago','estado'
    ];

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function boleta()
    {
        return $this->belongsTo(Boleta::class);
    }
}
