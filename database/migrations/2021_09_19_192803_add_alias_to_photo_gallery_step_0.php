<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAliasToPhotoGalleryStep0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema :: table('photo_gallery_step_0', function (Blueprint $table) {
            if(!Schema :: hasColumn('photo_gallery_step_0', 'alias_ge')) {
                $table -> string('alias_ge') -> default('');
            }

            if(!Schema :: hasColumn('photo_gallery_step_0', 'alias_en')) {
                $table -> string('alias_en') -> default('');
            }

            if(!Schema :: hasColumn('photo_gallery_step_0', 'alias_ru')) {
                $table -> string('alias_ru') -> default('');
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
            if(Schema :: hasColumn('photo_gallery_step_0', 'alias_ge')) {
                $table -> dropColumn('alias_ge');
            }

            if(Schema :: hasColumn('photo_gallery_step_0', 'alias_en')) {
                $table -> dropColumn('alias_en');
            }

            if(Schema :: hasColumn('photo_gallery_step_0', 'alias_ru')) {
                $table -> dropColumn('alias_ru');
            }
        });
    }
}
