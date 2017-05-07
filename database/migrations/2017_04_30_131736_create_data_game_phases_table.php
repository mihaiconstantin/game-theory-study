<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataGamePhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_game_phases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_participant_id');

            $table->string('phase_context');

            $table->integer('game_number');
            $table->integer('phase_number');

            $table->string('play_time');

            $table->string('bias_type'); //comp, coop, or neut
            $table->boolean('competitive');

            $table->integer('user_choice');
            $table->integer('pc_choice');

            $table->integer('user_outcome');
            $table->integer('pc_outcome');

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
        Schema::dropIfExists('data_game_phases');
    }
}
