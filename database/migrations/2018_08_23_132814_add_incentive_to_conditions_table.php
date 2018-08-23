<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIncentiveToConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conditions', function (Blueprint $table) {
            $table->boolean('incentive')->after('opponent')->default(0);
            $table->text('incentive_text')->after('incentive')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conditions', function (Blueprint $table) {
            $table->dropColumn('incentive');
            $table->dropColumn('incentive_text');
        });
    }
}
