<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModulesChangeNullableValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modules', function (Blueprint $table) {
			$table -> string('alias') -> nullable(false) -> default('') -> change();
			$table -> string('title') -> nullable(false) -> default('') -> change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modules', function (Blueprint $table) {
			$table -> string('alias') -> nullable() -> change();
			$table -> string('title') -> nullable() -> change();
        });
    }
}
