<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenuButtonsStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_buttons', function (Blueprint $table) {
            if (!Schema::hasColumn('menu_buttons', 'rang')) {
                $table -> integer('rang') -> default(0);
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
            $table -> dropColumn('rang');
        });
    }
}
