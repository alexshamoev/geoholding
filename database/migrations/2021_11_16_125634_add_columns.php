<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: table('module_blocks', function($table) {
            $table -> string('prefix_1') -> default('');
            $table -> string('prefix_2') -> default('');
            $table -> string('prefix_3') -> default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema :: table('module_blocks', function($table) {
            $table -> dropColumn('prefix_1');
            $table -> dropColumn('prefix_2');
            $table -> dropColumn('prefix_3');
        });
    }
}
