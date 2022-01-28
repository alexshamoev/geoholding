<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPublishedColumnFromPhotoGalleryStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo_gallery_step_0', function (Blueprint $table) {
            $table -> dropColumn('published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photo_gallery_step_0', function (Blueprint $table) {
            $table -> integer('published') -> default(0);
        });
    }
}
