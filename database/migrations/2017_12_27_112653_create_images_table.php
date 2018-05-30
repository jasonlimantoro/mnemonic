<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
    {
		Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->string('url_asset');
            $table->string('url_cache');
            $table->boolean('featured')->default(0);
			$table->string('caption')->nullable();
			$table->integer('imageable_id')->default(4);
			$table->string('imageable_type')->default('App\\\Album');
			$table->index(['imageable_id', 'imageable_type']);
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
        Schema::dropIfExists('images');
    }
}
