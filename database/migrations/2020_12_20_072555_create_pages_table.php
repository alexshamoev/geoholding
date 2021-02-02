<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table -> string('alias_ge') -> default('');
			$table -> string('title_ge') -> default('');
			$table -> text('text_ge') -> nullable();
			$table -> string('alias_en') -> default('');
			$table -> string('title_en') -> default('');
			$table -> text('text_en') -> nullable();;
			$table -> string('alias_ru') -> default('');
			$table -> string('title_ru') -> default('');
			$table -> text('text_ru') -> nullable();
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
        Schema::dropIfExists('pages');
    }
}
