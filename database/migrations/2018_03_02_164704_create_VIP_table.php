<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVIPTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VIP', function (Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->string('mother')->nullable();
            $table->string('father')->nullable();
            $table->enum('gender', ['male', 'female']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('VIP');
    }
}
