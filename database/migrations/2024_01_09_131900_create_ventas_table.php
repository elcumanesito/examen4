<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('idventa');
            $table->foreignId('idcliente')->constrained('clientes');
            $table->foreignId('idtrabajador')->constrained('trabajadores');
            $table->foreignId('idproducto')->constrained('productos');
            $table->timestamp('fecha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
