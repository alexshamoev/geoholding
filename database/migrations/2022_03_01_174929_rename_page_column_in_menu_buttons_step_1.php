<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePageColumnInMenuButtonsStep1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_buttons_step_1', function (Blueprint $table) {
            $table -> renameColumn('page', 'page_id');
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
            $table -> renameColumn('page_id', 'page');
        });
    }
}
