<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->string('quote');
			$table->text('body');
			$table->integer('user_id');
			$table->integer('offline_writer_id');
			$table->string('offline_writer');
			$table->integer('category_id');
			$table->integer('topic_id');
			$table->string('status');

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
        Schema::dropIfExists('contents');
    }
}
