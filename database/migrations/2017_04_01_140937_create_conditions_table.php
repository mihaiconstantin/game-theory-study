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
            $table->string("name")->unique();
            $table->string("design_chain");
            $table->string("bias_chain");

            $table->tinyInteger("random_design_iteration");
            $table->tinyInteger("random_design_chain");

            $table->string("opponent");

            $table->string("title");
            $table->text("text_competitive");
            $table->text("text_cooperative");
            $table->text("text_neutral");

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
        Schema::dropIfExists('conditions');
    }
}
