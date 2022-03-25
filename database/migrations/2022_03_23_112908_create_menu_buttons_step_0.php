<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuButtonsStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_buttons_step_0', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table -> string('title_ge') -> default('');
			$table -> string('title_en') -> default('');
			$table -> string('title_ru') -> default('');
			$table -> integer('page_id') -> default(0);
			$table -> integer('rang') -> default(0);
			$table -> string('free_link_ge') -> default('');
			$table -> string('free_link_en') -> default('');
			$table -> string('free_link_ru') -> default('');
			$table -> string('link_type') -> default('page');
			$table -> integer('module_step') -> default(0);
			$table -> integer('open_in_new_tab') -> default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_buttons_step_0');
    }
}
