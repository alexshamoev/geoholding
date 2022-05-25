<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsStep4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_step_4', function (Blueprint $table) {
            $table->id();
            $table->integer('top_level')->default(0);
            $table->string('title_ge')->default('');
            $table->string('title_en')->default('');
            $table->string('title_ru')->default('');
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
        Schema::dropIfExists('products_step_4');
    }
}
