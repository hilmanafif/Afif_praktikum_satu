<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfilToUserMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_meta', function (Blueprint $table) {
          $table->string('tempat_lahir');
          $table->date('tanggal_lahir');
          $table->string('jenis_kelamin');
          $table->integer('agama_id');
          $table->string('alamat');
          $table->string('no_ktp')->nullable();
          $table->string('img_ktp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $table->dropColumn('tempat_lahir');
      $table->dropColumn('tanggal_lahir');
      $table->dropColumn('jenis_kelamin');
      $table->dropColumn('agama_id');
      $table->dropColumn('alamat');
      $table->dropColumn('no_ktp');
      $table->dropColumn('img_ktp');
    }
}
