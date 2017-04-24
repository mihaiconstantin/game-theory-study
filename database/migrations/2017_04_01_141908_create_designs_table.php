<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("label");
            $table->tinyInteger("iterations");
            $table->string("outcome_1_values");
            $table->string("outcome_2_values");
            $table->string("outcome_3_values");
            $table->string("outcome_4_values");
            $table->string("outcome_1_description");
            $table->string("outcome_2_description");
            $table->string("outcome_3_description");
            $table->string("outcome_4_description");

            $table->timestamps();

            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designs');
    }
}
