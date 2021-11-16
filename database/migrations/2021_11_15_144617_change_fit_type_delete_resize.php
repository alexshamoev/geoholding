<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFitTypeDeleteResize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: table('module_blocks', function (Blueprint $table) {
            $table -> string('fit_type', 50) -> nullable(null) -> default('') -> change();
            $table -> string('fit_type_1', 50) -> nullable(null) -> default('') -> change();
            $table -> string('fit_type_2', 50) -> nullable(null) -> default('') -> change();
            $table -> string('fit_type_3', 50) -> nullable(null) -> default('') -> change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema :: table('module_blocks', function (Blueprint $table) {
            $table -> bigInteger('fit_type') -> nullable(null) -> charset(null) -> collation(null) -> default(0) -> change();
            $table -> bigInteger('fit_type_1') -> nullable(null) -> charset(null) -> collation(null) -> default(0) -> change();
            $table -> bigInteger('fit_type_2') -> nullable(null) -> charset(null) -> collation(null) -> default(0) -> change();
            $table -> bigInteger('fit_type_3') -> nullable(null) -> charset(null) -> collation(null) -> default(0) -> change();
        });
    }
}
