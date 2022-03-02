<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuButtonStep0 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_buttons_step_0';


	private static $lang;
	private static $pageAlias;


	public static function setLang($value) {
		self :: $lang = $value;
	}


	public static function setPage($value) {
		self :: $pageAlias = $value;
	}


	public function getTitleAttribute() {
        return $this -> { 'title_'.self :: $lang };
    }


	public function getFreeLinkAttribute() {
        return $this -> { 'free_link_'.self :: $lang };
    }
	

	public function getUrlTargetAttribute() {
		if($this -> open_in_new_tab) {
			return '_blank';
		}
		
		return '_self';
    }


	public function getUrlAttribute() {
		switch($this -> link_type) {
			case 'page':
				return '/'.self :: $lang.'/'.$this -> page -> alias;

				break;
			case 'free_link':
				return $this -> freeLink;

				break;
			case 'without_link':
				return false;

				break;
		}
    }

	
	public function getActiveAttribute() {
		if($this -> page -> alias === self :: $pageAlias) {
        	return 1;
		} else {
			return 0;
		}
    }
	

	public function page() {
        return $this -> hasOne(Page :: class, 'id', 'page_id');
    }


	public function subMenus() {
        return $this -> hasMany(MenuButtonStep1 :: class, 'parent', 'id');
    }
}