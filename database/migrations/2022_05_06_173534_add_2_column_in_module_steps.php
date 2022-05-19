<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add2ColumnInModuleSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_steps', function (Blueprint $table) {
            $table->string('sort_by')->default('rang DESC');
            $table->string('main_column')->default('title_ge');
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
            $table->dropColumn('sort_by');
            $table->dropColumn('main_column');
        });
    }
}
