<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Remove3ColumnFromModuleBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_blocks', function (Blueprint $table) {
            $table->dropColumn('a_use_for_sort');
            $table->dropColumn('sort_by_desc');
            $table->dropColumn('a_use_for_tags');
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
            $table -> integer('a_use_for_sort') -> default(0);
            $table -> integer('sort_by_desc') -> default(0);
            $table -> integer('a_use_for_tags') -> default(0);
        });
    }
}
