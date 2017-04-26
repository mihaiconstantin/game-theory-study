<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddRenameColumnInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // renaming column
        Schema::table('instructions', function (Blueprint $table){
            $table->renameColumn('context', 'current_url');
        });

        // adding new column
        Schema::table('instructions', function (Blueprint $table){
            $table->string('next_url')->after('current_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructions', function (Blueprint $table){
            $table->renameColumn('current_url', 'context');
        });

        Schema::table('instructions', function (Blueprint $table){
            $table->dropColumn('next_url');
        });
    }
}
