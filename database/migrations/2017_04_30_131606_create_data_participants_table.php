<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('code', '10')->unique();

            $table->string('study_name');
            $table->integer('study_time');
            $table->boolean('study_integrity');

            $table->string('condition_name');
            $table->string('opponent_name');

            $table->smallInteger('games_played');
            $table->smallInteger('game_phases_played');
            $table->smallInteger('practice_phases_played');

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
        Schema::dropIfExists('data_participants');
    }
}
