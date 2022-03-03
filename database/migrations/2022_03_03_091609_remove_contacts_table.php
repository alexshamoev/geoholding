<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema :: dropIfExists('contacts');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema :: create('contacts', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> string('name');
            $table -> string('subject');
            $table -> text('text');
            $table -> timestamps();
        });
    }
}
