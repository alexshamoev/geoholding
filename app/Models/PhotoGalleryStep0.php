<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class PhotoGalleryStep0 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo_gallery_step_0';


	private static $lang;
	private static $pageAlias;


	public static function setLang($value) {
		self :: $lang = $value;
	}


	public static function setPageAlias($value) {
		self :: $pageAlias = $value;
	}


	public function getAliasAttribute() {
        return $this -> { 'alias_'.self :: $lang };
    }


	public function getTitleAttribute() {
        return $this -> { 'title_'.self :: $lang };
    }


	public function getTextAttribute() {
        return $this -> { 'text_'.self :: $lang };
    }

    
	public function getFullUrlAttribute() {
        return '/'.self :: $lang.'/'.self :: $pageAlias.'/'.$this -> alias;
    }

    public function getMetaTitleAttribute() {
        if($this -> { 'meta_title_'.self :: $lang }) {
            return $this -> { 'meta_title_'.self :: $lang };
        } else {
            return $this -> { 'title_'.self :: $lang };
        }
    }


	public function getMetaDescriptionAttribute() {
        if($this -> { 'meta_description_'.self :: $lang }) {
            $textAsDesc = strip_tags($this -> { 'meta_description_'.self :: $lang });
            return substr($textAsDesc, 0, 255);
        } else {
            $textAsDesc = strip_tags($this -> { 'text_'.self :: $lang });
            return substr($textAsDesc, 0, 255);
        }
    }

    public function getMetaUrlAttribute() {
        if(file_exists(public_path('/storage/images/modules/photo_gallery/step_0/'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/photo_gallery/step_0/'.$this -> { 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/photo_gallery/step_0/'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/photo_gallery/step_0/'.$this -> { 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }
}
