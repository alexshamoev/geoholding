<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModulesDeleteColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: table('modules', function (Blueprint $table) {
			if(Schema :: hasColumn('modules', 'title_ge')) {
				$table -> dropColumn('title_ge');
			}

			if(Schema :: hasColumn('modules', 'title_en')) {
				$table -> dropColumn('title_en');
			}

			if(Schema :: hasColumn('modules', 'title_ru')) {
				$table -> dropColumn('title_ru');
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
        Schema :: table('modules', function (Blueprint $table) {
			if(!Schema :: hasColumn('modules', 'title_ge')) {
				$table -> string('title_ge') -> default('');
			}

			if(!Schema :: hasColumn('modules', 'title_en')) {
				$table -> string('title_en') -> default('');
			}

			if(!Schema :: hasColumn('modules', 'title_ru')) {
				$table -> string('title_ru') -> default('');
			}
		});
    }
}
