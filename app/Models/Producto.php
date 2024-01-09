<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['codigo', 'nombre', 'descripcion', 'precio', 'stock'];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'idproducto');
    }
}
