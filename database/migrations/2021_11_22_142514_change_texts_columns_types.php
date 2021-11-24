<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTextsColumnsTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: table('news_step_0', function (Blueprint $table) {
            $table -> text('text_ge') -> nullable() -> change();
            $table -> text('text_en') -> nullable() -> change();
            $table -> text('text_ru') -> nullable() -> change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema :: table('news_step_0', function (Blueprint $table) {
            $table -> string('text_ge', 255) -> nullable(null) -> default('') -> change();
            $table -> string('text_en', 255) -> nullable(null) -> default('') -> change();
            $table -> string('text_ru', 255) -> nullable(null) -> default('') -> change();
        });
    }
}
