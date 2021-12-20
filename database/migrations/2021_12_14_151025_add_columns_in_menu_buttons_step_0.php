<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInMenuButtonsStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_buttons_step_0', function (Blueprint $table) {
            $table -> string('free_link_ge') -> default('');
			$table -> string('free_link_en') -> default('');
			$table -> string('free_link_ru') -> default('');
			$table -> string('link_type') -> default('page');
			$table -> integer('module_step') -> default(0);
			$table -> integer('open_in_new_tab') -> default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_buttons_step_0', function (Blueprint $table) {
            $table -> dropColumn('free_link_ge');
            $table -> dropColumn('free_link_en');
            $table -> dropColumn('free_link_ru');
            $table -> dropColumn('link_type');
            $table -> dropColumn('module_step');
            $table -> dropColumn('open_in_new_tab');
        });
    }
}
