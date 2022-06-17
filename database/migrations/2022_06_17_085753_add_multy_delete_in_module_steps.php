<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultyDeleteInModuleSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_steps', function (Blueprint $table) {
            $table->integer('possibility_to_multy_delete')->after('possibility_to_edit')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_steps', function (Blueprint $table) {
            $table->dropColumn(possibility_to_multy_delete);
        });
    }
}
