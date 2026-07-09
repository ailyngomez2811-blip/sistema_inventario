<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'nit_documento',
        'telefono',
        'email',
        'direccion',
        'contacto',
        'estado',
    ];
}
