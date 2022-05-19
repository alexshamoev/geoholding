<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesStep1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_step_1', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> integer('top_level') -> default(0);
            $table -> string('title_ge') -> default('');
            $table -> string('title_en') -> default('');
            $table -> string('title_ru') -> default('');
            $table -> integer('rang') -> default(0);
            $table -> string('meta_title_ge') -> default('');
            $table -> string('meta_title_en') -> default('');
            $table -> string('meta_title_ru') -> default('');
            $table -> string('meta_description_ge') -> default('');
            $table -> string('meta_description_en') -> default('');
            $table -> string('meta_description_ru') -> default('');
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
        Schema::dropIfExists('pages_step_1');
    }
}
