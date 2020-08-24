<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')
                  ->references('id')
                  ->on('clientes');
            $table->string('numeroFactura')->nullable();
            $table->date('fecha');
            $table->float('totalIVA5')->nullable();
            $table->float('totalIVA10')->nullable();
            $table->float('montoTotal')->nullable();
            $table->string('tipoVenta');
            $table->string('estadoVenta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
