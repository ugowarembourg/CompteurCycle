<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteurConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteur_cycle_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compteur_cycle_state_id')->unsigned()->nullable();
            $table->integer('sensor_id')->unsigned();
            $table->integer('nb_cycles')->default(0);
            $table->integer('temps_ouverture')->default(20000);
            $table->integer('interval_cyclage')->default(60000);
            $table->integer('nb_erreurs_max')->default(3);
            $table->string('commentaire');
            $table->timestamps();

            $table->foreign('compteur_cycle_state_id')->references('id')->on('compteur_cycle_states');
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
        Schema::dropIfExists('compteur_cycle_configs');
    }
}
