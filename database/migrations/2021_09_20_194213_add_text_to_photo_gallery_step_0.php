<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTextToPhotoGalleryStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema :: table('photo_gallery_step_0', function (Blueprint $table) {
            if(!Schema :: hasColumn('photo_gallery_step_0', 'text_ge')) {
                $table -> text('text_ge');
            }

            if(!Schema :: hasColumn('photo_gallery_step_0', 'text_en')) {
                $table -> text('text_en');
            }

            if(!Schema :: hasColumn('photo_gallery_step_0', 'text_ru')) {
                $table -> text('text_ru');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema :: table('photo_gallery_step_0', function (Blueprint $table) {
            if(Schema :: hasColumn('photo_gallery_step_0', 'text_ge')) {
                $table -> dropColumn('text_ge');
            }

            if(Schema :: hasColumn('photo_gallery_step_0', 'text_en')) {
                $table -> dropColumn('text_en');
            }

            if(Schema :: hasColumn('photo_gallery_step_0', 'text_ru')) {
                $table -> dropColumn('text_ru');
            }
        });
    }
}
