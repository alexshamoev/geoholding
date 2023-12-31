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
		
		$mainAlias = Page::firstWhere('slug', 'company')->{'alias_'.App :: getLocale()};

		switch($this -> link_type) {
			case 'page':
				if($this -> page && config('activeCompany')) {
					return '/'.App :: getLocale().'/'.$mainAlias.'/'.config('activeCompany')->alias.'/'.$this -> page -> alias;
				} else {
					return false;
				}

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
		if($this -> page) {
			if($this -> page -> alias === config('currentActiveTab')) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
    }
	

	public function page() {
        return $this -> hasOne(Page :: class, 'id', 'page_id');
    }


	public function menuButtonStep1() {
        return $this -> hasMany(MenuButtonStep1 :: class, 'top_level', 'id') -> orderBy('rang', 'desc');
    }
}