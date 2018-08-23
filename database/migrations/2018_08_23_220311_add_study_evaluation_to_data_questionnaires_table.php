<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudyEvaluationToDataQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_questionnaires', function (Blueprint $table) {
            $table->text('study_evaluation')->after('game_opponent_evaluation');
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
            $table->dropColumn('study_evaluation');
        });
    }
}
