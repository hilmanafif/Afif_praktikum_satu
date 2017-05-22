<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLogoFieldsToCompaniesTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function(Blueprint $table) {
            $table->dropColumn('logo');
            $table->string('officer_position')->default('');
            $table->string('officer_name')->default('');
            $table->string('logo_file_name')->nullable();
            $table->integer('logo_file_size')->nullable()->after('logo_file_name');
            $table->string('logo_content_type')->nullable()->after('logo_file_size');
            $table->timestamp('logo_updated_at')->nullable()->after('logo_content_type');
        });
    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function(Blueprint $table) {
            $table->dropColumn('officer_position');
            $table->dropColumn('officer_name');
            $table->dropColumn('logo_file_name');
            $table->dropColumn('logo_file_size');
            $table->dropColumn('logo_content_type');
            $table->dropColumn('logo_updated_at');

        });
    }

}
