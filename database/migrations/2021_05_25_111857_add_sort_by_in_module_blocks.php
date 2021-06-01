<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSortByInModuleBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_blocks', function (Blueprint $table) {
            if (!Schema::hasColumn('module_blocks', 'select_sort_by_text')) {
                $table -> string('select_sort_by_text') -> default('desc');
            }
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
            $table -> dropColumn('select_sort_by_text');
        });
    }
}
