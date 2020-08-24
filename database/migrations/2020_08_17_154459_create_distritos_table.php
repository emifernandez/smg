<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distritos', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('region_id');
            $table->string('distrito');
            $table->float('superficie_km2')->nullable();
            $table->timestamps();

            $table->primary(['id', 'region_id']);
            $table->foreign('region_id')->references('id')->on('regiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distritos');
    }
}
