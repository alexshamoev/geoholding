<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class PhotoGalleryStep1 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo_gallery_step_1';


	private static $lang;


	public static function setLang($value) {
		self :: $lang = $value;
	}


	public function getTitleAttribute() {
        return $this -> { 'title_'.self :: $lang };
    }


    public function photoGalleryStep0() {
        return $this -> hasOne(PhotoGalleryStep0 :: class, 'id', 'parent');
    }
}