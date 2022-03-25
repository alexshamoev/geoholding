<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModules extends Migration
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
			$table -> string('alias') -> default('');
			$table -> string('title') -> default('');
			$table -> integer('page_id') -> default(0);
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
