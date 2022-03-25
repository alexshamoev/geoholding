<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table -> string('title') -> default('');
			$table -> string('full_title') -> default('');
			$table -> integer('disable') -> default(0);
			$table -> integer('like_default') -> default(0);
			$table -> integer('like_default_for_admin') -> default(0);
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
        Schema::dropIfExists('languages');
    }
}
