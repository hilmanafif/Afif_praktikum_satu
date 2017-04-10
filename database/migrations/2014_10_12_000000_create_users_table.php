<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('employee_number');
            $table->integer('bagian_id')->unsigned();
            // $table->foreign('bagian_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('wilayah_id')->unsigned();
            // $table->foreign('wilayah_id')->references('id')->on('wilayahs')->onDelete('cascade');
            $table->integer('pangkat_id')->unsigned();
            // $table->foreign('pangkat_id')->references('id')->on('pangkats')->onDelete('cascade');
            $table->integer('jabatan_id')->unsigned();
            // $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('startworking_date');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
