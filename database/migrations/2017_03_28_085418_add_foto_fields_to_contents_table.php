<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFotoFieldsToContentsTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function(Blueprint $table) {

            $table->string('foto_file_name')->nullable();
            $table->integer('foto_file_size')->nullable()->after('foto_file_name');
            $table->string('foto_content_type')->nullable()->after('foto_file_size');
            $table->timestamp('foto_updated_at')->nullable()->after('foto_content_type');

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function(Blueprint $table) {

            $table->dropColumn('foto_file_name');
            $table->dropColumn('foto_file_size');
            $table->dropColumn('foto_content_type');
            $table->dropColumn('foto_updated_at');

        });
    }

}