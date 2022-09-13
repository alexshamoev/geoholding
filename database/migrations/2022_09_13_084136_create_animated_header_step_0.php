<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimatedHeaderStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animated_header_step_0', function (Blueprint $table) {
            $table->id();
            $table -> string('title_ge') -> default('');
            $table -> string('title_en') -> default('');
            $table -> string('title_ru') -> default('');
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
        Schema::dropIfExists('animated_header_step_0');
    }
}
