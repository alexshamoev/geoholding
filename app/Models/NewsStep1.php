<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class NewsStep1 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_step_1';


	private static $lang;
	private static $pageAlias;
	private static $step0Alias;


	public static function setLang($value) {
		self :: $lang = $value;
	}

	public static function setPageAlias($value) {
		self :: $pageAlias = $value;
	}

	public static function setStep0Alias($value) {
		self :: $step0Alias = $value;
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
        return '/'.self :: $lang.'/'.self :: $pageAlias.'/'.self :: $step0Alias.'/'.$this -> alias;
    }
}