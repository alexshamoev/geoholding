<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublishedToMenuButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_buttons', function (Blueprint $table) {
			if(!Schema::hasColumn('menu_buttons', 'published')) {
				$table -> integer('published') -> default(0);
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
        Schema::table('menu_buttons', function (Blueprint $table) {
            //
        });
    }
}
