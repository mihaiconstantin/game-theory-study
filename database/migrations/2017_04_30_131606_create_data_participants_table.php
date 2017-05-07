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
            $table->ipAddress('ip');
            $table->string('code', '10')->unique();

            $table->string('study_name');
            $table->string('study_time');

            $table->string('condition_name');

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
