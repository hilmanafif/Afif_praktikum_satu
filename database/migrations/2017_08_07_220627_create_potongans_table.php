<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePotongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potongans', function (Blueprint $table) {
            $table->increments('id');
		$table->string('nip');
    $table->string('jabatan');
		$table->integer('bpjs');
    $table->integer('dapenma');
    $table->integer('bpjskes');
    $table->integer('bpjspensiun');
    $table->integer('zakat');
    $table->integer('bjb');
    $table->integer('iurandw');
    $table->integer('tabungan');
    $table->integer('warung');
    $table->integer('pinjrutin');
    $table->integer('pinjperum');
    $table->integer('utangpeg');
    $table->integer('potlain');
    $table->integer('iuranykpp');
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
        Schema::dropIfExists('potongans');
    }
}
