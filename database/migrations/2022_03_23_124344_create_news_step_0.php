<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_step_0', function (Blueprint $table) {
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
			$table -> integer('checkbox') -> default(0);
			$table -> string('calendar') -> default('');
			$table -> string('multiply_checkbox_catg') -> default('');
			$table -> string('meta_title_ge') -> default('');
			$table -> string('meta_title_en') -> default('');
			$table -> string('meta_title_ru') -> default('');
			$table -> string('meta_description_ge') -> default('');
			$table -> string('meta_description_en') -> default('');
			$table -> string('meta_description_ru') -> default('');
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
        Schema::dropIfExists('news_step_0');
    }
}
