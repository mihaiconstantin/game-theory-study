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
            $table->text("text_chain");

            $table->tinyInteger("random_design_iteration");
            $table->tinyInteger("random_design_chain");

            $table->string("title");
            $table->string("opponent");

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
