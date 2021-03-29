<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModulesAddTitleColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema :: table('modules', function (Blueprint $table) {
			if(!Schema :: hasColumn('modules', 'title')) {
				$table -> string('title') -> default('');
			}
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema :: table('modules', function($table) {
			$table -> dropColumn('title');
		});
    }
}
