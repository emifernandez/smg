<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento');
            $table->string('ruc');
            $table->date('fecha_nacimiento');
            $table->bigInteger('nacionalidad');
            $table->bigInteger('ciudad')->nullable();
            $table->bigInteger('barrio')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('fecha_ingreso');
            $table->bigInteger('calificacione')->nullable();
            $table->integer('tipoCliente');
            $table->string('alergias')->nullable();
            $table->string('antecedentes')->nullable();
            $table->string('objetivo')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
