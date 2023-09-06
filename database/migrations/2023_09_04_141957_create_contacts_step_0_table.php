<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsStep0Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_step_0', function (Blueprint $table) {
            $table->id();
            $table->integer('top_level')->default(0);
            $table->string('title_ge')->default('');
            $table->string('title_en')->default('');
            $table->text('text_ge')->nullable();
            $table->text('text_en')->nullable();
            $table->string('phone_number')->default('');
            $table->string('email')->default('');
            $table->string('address_ge')->default('');
            $table->string('address_en')->default('');
            $table->string('address_link')->default('');
            $table->string('facebook_link')->default('');
            $table->string('instagram_link')->default('');
            $table->string('linkedin_link')->default('');
			$table->integer('rang')->default(0);
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
        Schema::dropIfExists('contacts_step_0');
    }
}
