<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'apellido', 'num_documento', 'direccion', 'telefono', 'email'];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'idcliente');
    }
}
