<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_step_0', function (Blueprint $table) {
            $table->id();
            $table->string('alias_ge')->default('');
            $table->string('alias_en')->default('');
            $table->string('alias_ru')->default('');
            $table->string('title_ge')->default('');
            $table->string('title_en')->default('');
            $table->string('title_ru')->default('');
            $table->text('text_ge')->nullable();
            $table->text('text_en')->nullable();
            $table->text('text_ru')->nullable();
            $table->integer('rang')->default(0);
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
        Schema::dropIfExists('products_step_0');
    }
}
