<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBswsTable extends Migration
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
			$table -> string('system_word') -> nullable();
			$table -> string('word_ge') -> nullable();
			$table -> string('word_en') -> nullable();
			$table -> string('word_ru') -> nullable();
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
