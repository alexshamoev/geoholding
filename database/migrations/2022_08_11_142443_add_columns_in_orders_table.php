<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('name')->default('')->after('delivery_type');
            $table->string('last_name')->default('')->after('name');
            $table->string('company_name')->default('')->after('last_name');
            $table->string('full_address')->default('')->after('company_name');
            $table->string('email')->default('')->after('full_address');
            $table->string('telephone')->default('')->after('email');
            $table->text('details')->nullable()->after('telephone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('last_name');
            $table->dropColumn('company_name');
            $table->dropColumn('full_address');
            $table->dropColumn('email');
            $table->dropColumn('telephone');
            $table->dropColumn('details');
        });
    }
}
