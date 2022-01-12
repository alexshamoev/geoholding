<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bsw;

class NewsStep2 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_step_2';


	private static $lang;
	private static $pageAlias;
	private static $step0Alias;
	private static $step1Alias;
	private static $step2Alias;


	public static function setLang($value) {
		self :: $lang = $value;
	}


	public static function setPageAlias($value) {
		self :: $pageAlias = $value;
	}


	public static function setStep0Alias($value) {
		self :: $step0Alias = $value;
	}


	public static function setStep1Alias($value) {
		self :: $step1Alias = $value;
	}


	public static function setStep2Alias($value) {
		self :: $step2Alias = $value;
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
        return '/'.self :: $lang.'/'.self :: $pageAlias.'/'.self :: $step0Alias.'/'.self :: $step1Alias.'/'.$this -> alias;
    }

	public function getMetaTitleAttribute() {
        $bsw = Bsw :: getFullData(self :: $lang);

        if($this -> { 'meta_title_'.self :: $lang }) {
            return $this -> { 'meta_title_'.self :: $lang };
        } else if($this -> { 'title_'.self :: $lang }) {
            return $this -> { 'title_'.self :: $lang };
        } else {
            return $bsw -> meta_title;
        }
    }


	public function getMetaDescriptionAttribute() {
        $bsw = Bsw :: getFullData(self :: $lang);
        if($this -> { 'meta_description_'.self :: $lang }) {
            $textAsDesc = strip_tags($this -> { 'meta_description_'.self :: $lang });
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else if($this -> { 'text_'.self :: $lang }) {
            $textAsDesc = strip_tags($this -> { 'text_'.self :: $lang });
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else {
            return $bsw -> meta_description;
        }
    }

    public function getMetaUrlAttribute() {
        if(file_exists(public_path('/storage/images/modules/news/step_2/meta_'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/photo_gallery/step_2/meta_'.$this -> { 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/news/step_2/'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/news/step_2/'.$this -> { 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }
}