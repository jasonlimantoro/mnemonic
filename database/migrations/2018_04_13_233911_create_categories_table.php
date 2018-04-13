<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

        Schema::create('categoriables', function (Blueprint $table) {
			$table->integer('category_id');
			$table->morphs('categoriable');
			$table->primary(['category_id', 'categoriable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categoriable');
    }
}
