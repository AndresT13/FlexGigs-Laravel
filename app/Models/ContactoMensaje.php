<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactoMensaje extends Model
{
    protected $table = 'contacto_mensajes';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'email',
        'tipo',
        'mensaje',
        'fecha_envio',
    ];
}
