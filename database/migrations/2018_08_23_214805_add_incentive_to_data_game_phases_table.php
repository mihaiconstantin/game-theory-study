<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIncentiveToDataGamePhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_game_phases', function (Blueprint $table) {
            $table->text('incentive')->after('play_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_game_phases', function (Blueprint $table) {
            $table->dropColumn('incentive');
        });
    }
}
