<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_elements', function (Blueprint $table) {
            $table->increments('id');

            // defining the basic structure
            $table->string('current_url');
            $table->string('name')->unique();
            $table->tinyInteger('order');

            // element type: input, textarea, or select
            $table->string('tag_type')->default('input');

            // assigning the HTML attributes
            $table->string('attr_name');
            $table->string('attr_id');
            $table->string('label');
            $table->string('attr_type')->nullable();
            $table->string('attr_placeholder')->nullable();
            $table->string('attr_value')->nullable();
            $table->string('attr_class')->nullable()->default('form-control');
            $table->string('attr_min')->nullable();
            $table->string('attr_max')->nullable();
            $table->boolean('attr_required')->nullable()->default('1');
            $table->boolean('attr_autocomplete')->nullable()->default('0');
            $table->boolean('attr_disabled')->nullable()->default('0');

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
        Schema::dropIfExists('form_elements');
    }
}
