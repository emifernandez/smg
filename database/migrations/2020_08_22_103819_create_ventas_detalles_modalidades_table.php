<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateVentasDetallesModalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_detalles_modalidades', function (Blueprint $table) {
            $table->foreignId('venta_id')
                  ->references('id')
                  ->on('ventas');
            $table->unsignedBigInteger('item');
            $table->smallInteger('cantidad');

            $table->unsignedBigInteger('precio_modalidad_id');
            $table->string('precio_modalidad_tiempo_id');

            $table->float('precio_unitario');
            $table->float('iva5')->nullable();
            $table->float('iva10')->nullable();
            $table->float('total');
            $table->timestamps();

            $table->primary(['venta_id', 'item']);
            $table->foreign(['precio_modalidad_id','precio_modalidad_tiempo_id'])->references(['modalidad_id','tiempo_id'])->on('lista_precios_modalidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_detalles_modalidades');
    }
}
