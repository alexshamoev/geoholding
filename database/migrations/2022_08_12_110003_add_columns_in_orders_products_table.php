<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_products', function (Blueprint $table) {
            $table->string('product_ge')->default('')->after('product_id');
            $table->string('product_en')->default('')->after('product_ge');
            $table->string('product_ru')->default('')->after('product_en');
            $table->integer('price')->default(0)->after('product_ru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_products', function (Blueprint $table) {
            $table->dropColumn('product_ge');
            $table->dropColumn('product_en');
            $table->dropColumn('product_ru');
            $table->dropColumn('price');
        });
    }
}
