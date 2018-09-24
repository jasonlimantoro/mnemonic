<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageablesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imageables', function (Blueprint $table) {
			$table->unsignedInteger('image_id');
			$table->unsignedInteger('imageable_id');
			$table->string('imageable_type');
			$table->string('caption')->nullable();

			$table->foreign('image_id')
			      ->references('id')
			      ->on('images')
			      ->onDelete('cascade')
			      ->onUpdate('cascade');

			$table->index(['image_id', 'imageable_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('imageables');
	}
}
