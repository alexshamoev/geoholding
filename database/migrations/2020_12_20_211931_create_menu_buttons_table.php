<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_buttons', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table -> string('title_ge') -> default('');
			$table -> string('title_en') -> default('');
			$table -> string('title_ru') -> default('');
			$table -> integer('page') -> default(0);
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
        Schema::dropIfExists('menu_buttons');
    }
}
