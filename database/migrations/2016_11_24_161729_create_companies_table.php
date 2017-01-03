<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('tax');
			$table->string('reg');
			$table->string('phone');
			$table->string('fax');
			$table->string('address1');
			$table->string('address2');
			$table->string('city');
			$table->string('province');
			$table->string('zip');
			$table->string('country');
			$table->string('logo');
			$table->string('timezone');
			$table->string('currency');

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
        Schema::dropIfExists('companies');
    }
}
