<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class News extends Model {

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_step_0';


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
}
