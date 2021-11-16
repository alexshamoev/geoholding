<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCoverAndFill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: table('module_blocks', function (Blueprint $table) {
            $table -> renameColumn('image_cover', 'fit_type');
            $table -> renameColumn('image_cover_1', 'fit_type_1');
            $table -> renameColumn('image_cover_2', 'fit_type_2');
            $table -> renameColumn('image_cover_3', 'fit_type_3');
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
            $table -> renameColumn('fit_type', 'image_cover');
            $table -> renameColumn('fit_type_1', 'image_cover_1');
            $table -> renameColumn('fit_type_2', 'image_cover_2');
            $table -> renameColumn('fit_type_3', 'image_cover_3');
        });
    }
}
