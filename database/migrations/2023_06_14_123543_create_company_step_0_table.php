<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyStep0Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_step_0', function (Blueprint $table) {
            $table->id();
            $table->string('alias_ge')->default('');
			$table->string('alias_en')->default('');
			$table->string('title_ge')->default('');
			$table->string('title_en')->default('');
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
        Schema::dropIfExists('company_step_0');
    }
}
