<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInContactsStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table -> string('last_name') -> default('') -> after('name');
            $table -> string('email') -> default('') -> after('last_name');
            $table -> string('phone') -> default('') -> after('email');
            $table -> string('address') -> default('') -> after('phone');
            $table -> string('comment') -> default('') -> after('address');
            $table -> dropColumn('subject');
            $table -> dropColumn('text');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table -> dropColumn('last_name');
            $table -> dropColumn('email');
            $table -> dropColumn('phone');
            $table -> dropColumn('address');
            $table -> dropColumn('comment');
            $table -> string('subject') -> default('');
            $table -> string('text') -> default('');
        });
    }
}
