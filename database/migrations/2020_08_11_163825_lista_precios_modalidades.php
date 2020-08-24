<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListaPreciosModalidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_precios_modalidades', function (Blueprint $table) {
            $table->foreignId('modalidad_id')
                  ->references('id')
                  ->on('modalidades');
            $table->string('tiempo_id');
            $table->integer('precio');
            $table->timestamps();
            $table->primary(['modalidad_id', 'tiempo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_precios_modalidades');
    }
}
