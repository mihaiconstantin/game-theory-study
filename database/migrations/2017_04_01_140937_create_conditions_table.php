<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("location");
            $table->string("design_chain");
            $table->string("bias_chain");
            $table->string("opponent_chain");
            $table->tinyInteger("randomize_design_iterations");
            $table->tinyInteger("randomize_design_chain");
            $table->text("description_competitive");
            $table->text("description_cooperative");
            $table->text("description_neutral");

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
        Schema::dropIfExists('conditions');
    }
}
