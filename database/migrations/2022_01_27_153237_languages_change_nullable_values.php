<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LanguagesChangeNullableValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
			$table -> string('title') -> nullable(false) -> default('') -> change();
			$table -> string('full_title') -> nullable(false) -> default('') -> change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('languages', function (Blueprint $table) {
			$table -> string('title') -> nullable() -> change();
			$table -> string('full_title') -> nullable() -> change();
        });
    }
}
