<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUseExistingStepFromModuleSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_steps', function (Blueprint $table) {
            $table->dropColumn('use_existing_step');
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
            $table -> integer('use_existing_step') -> default(0);
        });
    }
}
