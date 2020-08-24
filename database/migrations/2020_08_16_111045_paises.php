<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 300);
            $table->string('name', 300);
            $table->string('nom', 300);
            $table->string('iso2', 2);
            $table->string('iso3', 3);
            $table->smallInteger('phone_code')->nullable();
            $table->string('gentilicio', 100)->nullable();
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
        Schema::dropIfExists('paises');
    }
}
