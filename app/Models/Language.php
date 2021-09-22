<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';
	
	private static $lang;
	private static $page;


	public static function setLang($value) {
		self :: $lang = $value;
	}

	public static function setPage($value) {
		self :: $page = $value;
	}


	public function getFullUrlAttribute() {
		$full_url = '';
		
		if(self :: $page -> like_default) {
			if($this -> like_default) {
				$full_url = '/';
			} else {
				$full_url = '/'.$this -> title;
			}
		} else {
			$full_url = '/'.$this -> title.'/'.self :: $page -> { 'alias_'.$this -> title };
		}


        return $full_url;
    }


	public function getActiveAttribute() {
		if(self :: $lang === $this -> title) {
			$languagesUpdatedData[$i] -> active = true;
		}
    }
}
