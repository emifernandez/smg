<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Regiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regiones', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('pais_id')
                  ->references('id')
                  ->on('paises');
            $table->string('nombre');
            $table->string('capital');
            $table->float('superficie_km2');
            $table->smallInteger('cantidad_distritos');
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
        Schema::dropIfExists('regiones');
    }


}
