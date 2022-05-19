<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;


class Page extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages_step_0';


	public function getFullUrlAttribute() {
        return '/'.App::getLocale().'/'.$this->alias;
    }


	public function getAliasAttribute() {
        return $this->{ 'alias_'.App::getLocale() };
    }


	public function getTitleAttribute() {
        return $this->{ 'title_'.App::getLocale() };
    }


	public function getMetaTitleAttribute() {
        if($this->{ 'meta_title_'.App::getLocale() }) {
            return $this->{ 'meta_title_'.App::getLocale() };
        } else {
            return $this->{ 'title_'.App::getLocale() };
        }
    }


	public function getMetaDescriptionAttribute() {
        if($this->{ 'meta_description_'.App::getLocale() }) {
            $textAsDesc = strip_tags($this->{ 'meta_description_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else {
            $textAsDesc = strip_tags($this->{ 'text_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        }
    }


    public function getMetaUrlAttribute() {
        if(file_exists(public_path('/storage/images/modules/pages/step_0/'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/pages/step_0/'.$this->{ 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }


	public function getTextAttribute() {
        return $this->{ 'text_'.App::getLocale() };
    }

    
    public function getFullUrl($lang) {
        // if($this->like_default) {
        //     return '/'.$lang;
        // }

        return '/'.$lang.'/'.$this->{ 'alias_'.$lang };
    }
}