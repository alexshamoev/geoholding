<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages_step_0';


	private static $lang;


	public static function setLang($value) {
		self :: $lang = $value;
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
}