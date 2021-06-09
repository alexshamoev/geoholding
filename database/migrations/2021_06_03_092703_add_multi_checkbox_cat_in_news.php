<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultiCheckboxCatInNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            if (!Schema::hasColumn('news', 'multiply_checkbox_catg')) {
                $table -> string('multiply_checkbox_catg') -> default('');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table -> string('multiply_checkbox_catg') -> default('');
        });
    }
}
