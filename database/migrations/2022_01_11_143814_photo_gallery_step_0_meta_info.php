<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhotoGalleryStep0MetaInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo_gallery_step_0', function (Blueprint $table) {
            $table -> string('meta_title_ge') -> default('');
            $table -> string('meta_title_en') -> default('');
            $table -> string('meta_title_ru') -> default('');
            $table -> string('meta_description_ge') -> default('');
            $table -> string('meta_description_en') -> default('');
            $table -> string('meta_description_ru') -> default('');
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
            $table -> dropColumn('meta_title_ge');
            $table -> dropColumn('meta_title_en');
            $table -> dropColumn('meta_title_ru');
            $table -> dropColumn('meta_description_ge');
            $table -> dropColumn('meta_description_en');
            $table -> dropColumn('meta_description_ru');
        });
    }
}
