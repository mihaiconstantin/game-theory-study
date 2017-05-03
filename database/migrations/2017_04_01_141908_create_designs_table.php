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
            $table->string("name")->unique();

            $table->tinyInteger("iterations");
            $table->enum('competitive_option', ['1', '2'])->default(2);

            $table->string("outcome_1_value");
            $table->string("outcome_2_value");
            $table->string("outcome_3_value");
            $table->string("outcome_4_value");

            $table->string("label");

            $table->string("outcome_1_description");
            $table->string("outcome_2_description");
            $table->string("outcome_3_description");
            $table->string("outcome_4_description");

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
        Schema::dropIfExists('designs');
    }
}
