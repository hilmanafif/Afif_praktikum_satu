<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->increments('id');
			$table->string('kode_umum');
            $table->string('kode');
			$table->string('name')->nullable();
            $table->string('name_umum')->nullable();
            $table->integer('Tunjab')->nullable();
            $table->integer('Tunpres')->nullable();
            $table->integer('Tupel')->nullable();
            $table->integer('Turam')->nullable();

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
        Schema::dropIfExists('jabatans');
    }
}
