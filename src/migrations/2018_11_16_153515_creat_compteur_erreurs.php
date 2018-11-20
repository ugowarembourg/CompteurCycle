<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCompteurErreurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteur_cycle_erreurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sensor_id')->unsigned();
            $table->text('erreur');
            $table->timestamps();

            $table->foreign('sensor_id')->references('id')->on('sensors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compteur_cycle_erreurs');
    }
}
