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
			$table->string('description');
            $table->timestamps();
        });

        Schema::create('categoriables', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
			$table->morphs('categoriable');
			// primary keys
			$table->primary(['category_id', 'categoriable_id']);
			// foreign-key constrains
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');  
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
