<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditModulStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_steps', function (Blueprint $table) {
            $table->string('order_by_column')->default('rang');
            $table->string('order_by_sequence')->default('DESC');
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
            $table->dropColumn('order_by_column');
            $table->dropColumn('order_by_sequence');
        });
    }
}
