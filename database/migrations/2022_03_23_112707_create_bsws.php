<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBsws extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsws', function (Blueprint $table) {
			$table -> bigIncrements('id');
			$table -> string('system_word') -> default('');
			$table -> string('word_ge') -> default('');
			$table -> string('word_en') -> default('');
			$table -> string('word_ru') -> default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema :: dropIfExists('bsws');
    }
}
