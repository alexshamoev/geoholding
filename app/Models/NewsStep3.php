<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bsw;

class NewsStep3 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_step_3';


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
        return $this -> parentModel -> fullUrl.'/'.$this -> alias;
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
        if(file_exists(public_path('/storage/images/modules/news/step_3/meta_'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/photo_gallery/step_3/meta_'.$this -> { 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/news/step_3/'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/news/step_3/'.$this -> { 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }


	public function parentModel() {
        return $this -> hasOne(NewsStep2 :: class, 'id', 'parent');
    }
}