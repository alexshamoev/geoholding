<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_steps', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table -> integer('top_level') -> default(0);
			$table -> string('title') -> default('');
			$table -> string('db_table') -> default('');
			$table -> integer('images') -> default(0);
			$table -> integer('possibility_to_add') -> default(0);
			$table -> integer('possibility_to_delete') -> default(0);
			$table -> integer('possibility_to_rang') -> default(0);
			$table -> integer('possibility_to_edit') -> default(0);
			$table -> integer('use_existing_step') -> default(0);
			$table -> integer('blocks_max_number') -> default(0);
			$table -> integer('rang') -> default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_steps');
    }
}
