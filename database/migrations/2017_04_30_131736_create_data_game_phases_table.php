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

            $table->integer('game_number');
            $table->integer('phase_number');

            $table->integer('play_time');
            $table->integer('result_time');

            $table->string('bias_type'); //comp, coop, or neut
            $table->boolean('competitive');

            $table->string('user_choice');
            $table->string('pc_choice');

            $table->string('user_outcome');
            $table->string('pc_outcome');

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
