<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModuleBlocksRemoveColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: table('module_blocks', function (Blueprint $table) {
			if(Schema :: hasColumn('module_blocks', 'column_type')) {
				$table -> dropColumn('column_type');
			}

			if(Schema :: hasColumn('module_blocks', 'column_length')) {
				$table -> dropColumn('column_length');
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
		Schema :: table('module_blocks', function (Blueprint $table) {
			if(!Schema :: hasColumn('module_blocks', 'column_length')) {
				$table -> integer('column_length') -> default(0);
			}

			if(!Schema :: hasColumn('module_blocks', 'column_type')) {
				$table -> integer('column_type') -> default(0);
			}
		});
    }
}
