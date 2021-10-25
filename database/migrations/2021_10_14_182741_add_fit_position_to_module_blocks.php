<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFitPositionToModuleBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema :: table('module_blocks', function (Blueprint $table) {
            if(!Schema :: hasColumn('module_blocks', 'fit_position')) {
                $table -> string('fit_position') -> default('');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema :: table('module_blocks', function (Blueprint $table) {
            if(Schema :: hasColumn('module_blocks', 'fit_position')) {
                $table -> dropColumn('fit_position');
            }
        });
    }
}
