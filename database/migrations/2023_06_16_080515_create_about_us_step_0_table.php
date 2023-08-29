<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsStep0Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_step_0', function (Blueprint $table) {
            $table->id();
            $table->integer('top_level')->default(0);
            $table->string('title_ge')->default('');
            $table->string('title_en')->default('');
            $table->text('section1_text_ge')->nullable();
            $table->text('section1_text_en')->nullable();
            $table->string('section2_title_ge')->default('');
            $table->string('section2_title_en')->default('');
            $table->text('section2_text_ge')->nullable();
            $table->text('section2_text_en')->nullable();
            $table->string('section3_title_ge')->default('');
            $table->string('section3_title_en')->default('');
            $table->text('section3_text_ge')->nullable();
            $table->text('section3_text_en')->nullable();
			$table->string('meta_title_ge')->default('');
			$table->string('meta_title_en')->default('');
			$table->string('meta_description_ge')->default('');
			$table->string('meta_description_en')->default('');
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
        Schema::dropIfExists('about_us_step_0');
    }
}
