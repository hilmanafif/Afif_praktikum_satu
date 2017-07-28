<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTupelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tupels', function (Blueprint $table) {
            $table->increments('id');
		$table->integer('tupel');
		$table->integer('tukebar');
		$table->integer('tujkinerja');
		$table->string('jabatan');
		$table->integer('jabatan_id');

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
        Schema::dropIfExists('tupels');
    }
}
