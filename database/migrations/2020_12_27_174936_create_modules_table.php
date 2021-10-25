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
        Schema :: create('modules', function (Blueprint $table) {
            $table -> bigIncrements('id');
			$table -> integer('include_type') -> default(0);
			$table -> string('alias') -> nullable();
			$table -> string('title') -> nullable();
			$table -> integer('page') -> default(0);
			$table -> integer('hide_for_admin') -> default(0);
			$table -> string('icon_bg_color') -> default('');
			$table -> integer('rang') -> default(0);
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema :: dropIfExists('modules');
    }
}
