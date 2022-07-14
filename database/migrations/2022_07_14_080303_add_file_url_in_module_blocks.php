<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileUrlInModuleBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_blocks', function (Blueprint $table) {
            $table->integer('show_file_url')->after('file_possibility_to_delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_blocks', function (Blueprint $table) {
            $table->dropColumn('show_file_url');
        });
    }
}
