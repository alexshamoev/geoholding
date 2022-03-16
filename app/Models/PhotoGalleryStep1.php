<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App;


class PhotoGalleryStep1 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo_gallery_step_1';


	public function getTitleAttribute() {
        return $this -> { 'title_'.App :: getLocale() };
    }

    
    public function getFullUrlAttribute() {
        return $this -> photoGalleryStep0 -> fullUrl.'/'.$this -> alias;
    }

    
	public function getFullUrl($lang) {
        return $this -> photoGalleryStep0 -> getFullUrl($lang).'/'.$this -> { 'alias_'.$lang };
    }


    public function photoGalleryStep0() {
        return $this -> hasOne(PhotoGalleryStep0 :: class, 'id', 'parent');
    }
}