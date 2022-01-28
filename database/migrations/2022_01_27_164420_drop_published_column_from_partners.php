<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPublishedColumnFromPartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: table('partners_step_0', function (Blueprint $table) {
          if(Schema :: hasColumn('partners_step_0', 'published')) {
            $table -> dropColumn('published');
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
      Schema :: table('partners_step_0', function (Blueprint $table) {
        if(!Schema :: hasColumn('partners_step_0', 'published')) {
          $table -> integer('published') -> default(0);
        }
      });
    }
}
