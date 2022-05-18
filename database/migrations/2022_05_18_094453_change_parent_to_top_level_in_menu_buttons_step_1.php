<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeParentToTopLevelInMenuButtonsStep1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_buttons_step_1', function (Blueprint $table) {
            $table->renameColumn('parent', 'top_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_buttons_step_1', function (Blueprint $table) {
            $table->renameColumn('top_level', 'parent');
        });
    }
}
