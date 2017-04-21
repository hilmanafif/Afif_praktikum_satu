<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGajipokoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajipokoks', function (Blueprint $table) {
            $table->increments('id');
			$table->string('pangkat_id');
			$table->string('ruang');
            $table->string('kodgol_lama');
            $table->string('gaji_pokok');

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
        Schema::dropIfExists('gajipokoks');
    }
}
