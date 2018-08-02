<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGameOpponentEvaluationToDataQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_questionnaires', function (Blueprint $table) {
            $table->text('game_opponent_evaluation')->after('game_question');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_questionnaires', function (Blueprint $table) {
            $table->dropColumn('game_opponent_evaluation');
        });
    }
}
