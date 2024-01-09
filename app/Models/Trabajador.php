<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento', 'num_documento', 'direccion', 'telefono', 'email'];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'idtrabajador');
    }
}
