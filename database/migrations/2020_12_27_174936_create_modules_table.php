<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table -> integer('include_type') -> default(0);
			$table -> string('alias') -> default('');
			$table -> string('title_ge') -> default('');
			$table -> string('title_en') -> default('');
			$table -> string('title_ru') -> default('');
			$table -> integer('page') -> default(0);
			$table -> integer('hide_for_admin') -> default(0);
			$table -> string('icon_bg_color') -> default('');
			$table -> integer('rang') -> default(0);
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
        Schema::dropIfExists('modules');
    }
}
