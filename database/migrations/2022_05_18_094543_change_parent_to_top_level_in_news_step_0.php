<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeParentToTopLevelInNewsStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_step_1', function (Blueprint $table) {
            $table->renameColumn('parent', 'top_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_step_1', function (Blueprint $table) {
            $table->renameColumn('top_level', 'parent');
        });
    }
}
