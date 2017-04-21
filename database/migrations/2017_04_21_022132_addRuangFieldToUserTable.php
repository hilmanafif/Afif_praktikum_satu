<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRuangFieldToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('users', function(Blueprint $table) {

             $table->integer('ruang')->nullable()->after('pangkat_id');

         });

     }

     /**
      * Revert the changes to the table.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('users', function(Blueprint $table) {

             $table->dropColumn('ruang');

         });
     }
}
