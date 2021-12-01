<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCategoryFromPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages_step_0', function (Blueprint $table) {
            if(Schema :: hasColumn('pages_step_0', 'category')) {
				$table -> dropColumn('category');
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
        Schema::table('pages_step_0', function (Blueprint $table) {
            if(!Schema :: hasColumn('pages_step_0', 'category')) {
				$table -> integer('category') -> default(0);
			}
        });
    }
}
