<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotakeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('anggotakeluargas', function (Blueprint $table) {
      $table->increments('id');
			$table->integer('user_id');
			$table->string('nama');
			$table->string('hub_keluarga');
			$table->string('tempat_lahir');
			$table->date('tanggal_lahir');
			$table->string('jenis_kelamin');
			$table->integer('agama_id');

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
        Schema::dropIfExists('anggotakeluargas');
    }
}
