<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;


class MenuButtonStep0 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_buttons_step_0';


	private static $pageAlias;


	public static function setPage($value) {
		self :: $pageAlias = $value;
	}


	public function getTitleAttribute() {
        return $this -> { 'title_'.App :: getLocale() };
    }


	public function getFreeLinkAttribute() {
        return $this -> { 'free_link_'.App :: getLocale() };
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
				return '/'.App :: getLocale().'/'.$this -> page -> alias;

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
        return $this -> hasMany(MenuButtonStep1 :: class, 'parent', 'id') -> orderBy('rang', 'desc');
    }
}