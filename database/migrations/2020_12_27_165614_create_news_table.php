<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table -> string('alias_ge') -> default('');
			$table -> string('alias_en') -> default('');
			$table -> string('alias_ru') -> default('');
			$table -> string('title_ge') -> default('');
			$table -> string('title_en') -> default('');
			$table -> string('title_ru') -> default('');
			$table -> string('text_ge') -> default('');
			$table -> string('text_en') -> default('');
			$table -> string('text_ru') -> default('');
			$table -> integer('rang') -> default(0);
			$table -> integer('published') -> default(0);
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
        Schema::dropIfExists('news');
    }
}
