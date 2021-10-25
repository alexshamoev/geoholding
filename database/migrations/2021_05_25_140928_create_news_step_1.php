<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsStep1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_step_1', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> integer('parent') -> default(0);
            $table -> string('alias_ge') -> default('');
            $table -> string('alias_en') -> default('');
            $table -> string('alias_ru') -> default('');
            $table -> string('title_ge') -> default('');
            $table -> string('title_en') -> default('');
            $table -> string('title_ru') -> default('');
            $table -> text('text_ge') -> nullable();
            $table -> text('text_en') -> nullable();
            $table -> text('text_ru') -> nullable();
            $table -> integer('rang') -> default(0);
            $table -> integer('published') -> default(1);
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
        Schema::dropIfExists('news_step_1');
    }
}
