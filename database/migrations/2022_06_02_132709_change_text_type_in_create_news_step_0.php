<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTextTypeInCreateNewsStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_step_0', function (Blueprint $table) {
            $table->text('text_ge')->nullable()->change();
			$table->text('text_en')->nullable()->change();
			$table->text('text_ru')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_step_0', function (Blueprint $table) {
            $table->string('text_ge')->default('')->change();
			$table->string('text_en')->default('')->change();
			$table->string('text_ru')->default('')->change();
        });
    }
}
