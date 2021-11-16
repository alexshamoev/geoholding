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
        });
    }
}
