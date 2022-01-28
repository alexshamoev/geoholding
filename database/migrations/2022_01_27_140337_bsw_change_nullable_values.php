<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BswChangeNullableValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bsws', function (Blueprint $table) {
			$table -> string('system_word') -> nullable(false) -> default('') -> change();
			$table -> string('word_ge') -> nullable(false) -> default('') -> change();
			$table -> string('word_en') -> nullable(false) -> default('') -> change();
			$table -> string('word_ru') -> nullable(false) -> default('') -> change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bsws', function (Blueprint $table) {
			$table -> string('system_word') -> nullable() -> change();
			$table -> string('word_ge') -> nullable() -> change();
			$table -> string('word_en') -> nullable() -> change();
			$table -> string('word_ru') -> nullable() -> change();
        });
    }
}
