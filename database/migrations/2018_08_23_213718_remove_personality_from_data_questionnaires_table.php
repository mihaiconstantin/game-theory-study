<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePersonalityFromDataQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_questionnaires', function (Blueprint $table) {
            $table->dropColumn('personality');
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
            $table->text('personality')->after('data_participant_id');
        });

    }
}
