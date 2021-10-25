<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveReqiuredFromModuleBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_blocks', function (Blueprint $table) {
            if(Schema :: hasColumn('module_blocks', 'required')) {
				$table -> dropColumn('required');
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
        Schema::table('module_blocks', function (Blueprint $table) {
            if(!Schema :: hasColumn('module_blocks', 'required')) {
				$table -> integer('required') -> default(0);
			}
        });
    }
}
