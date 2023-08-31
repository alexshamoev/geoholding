<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesStep1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies_step_1', function (Blueprint $table) {
            $table->id();
            $table->integer('top_level')->default(0);
            $table->string('alias_ge')->default('');
			$table->string('alias_en')->default('');
            $table->string('title_ge')->default('');
            $table->string('title_en')->default('');
            $table->string('location_ge')->default('');
            $table->string('location_en')->default('');
            $table->string('email')->default('');
            $table->longText('text_ge')->nullable();
            $table->longText('text_en')->nullable();
            $table->string('last_date')->nullable();
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
        Schema::dropIfExists('vacancies_step_1');
    }
}
