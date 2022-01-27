<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BscChangeNullableValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bscs', function (Blueprint $table) {
			$table -> string('system_word') -> nullable(false) -> default('') -> change();
			$table -> string('configuration') -> nullable(false) -> default('') -> change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bscs', function (Blueprint $table) {
			$table -> string('system_word') -> nullable() -> change();
			$table -> string('configuration') -> nullable() -> change();
        });
    }
}
