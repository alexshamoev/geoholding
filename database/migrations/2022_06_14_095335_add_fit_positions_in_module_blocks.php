<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFitPositionsInModuleBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_blocks', function (Blueprint $table) {
            $table -> string('fit_position_1')->default('')->after('fit_position');
            $table -> string('fit_position_2')->default('')->after('fit_position_1');
            $table -> string('fit_position_3')->default('')->after('fit_position_2');
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
            $table -> dropColumn('fit_position_1');
            $table -> dropColumn('fit_position_2');
            $table -> dropColumn('fit_position_3');
        });
    }
}
