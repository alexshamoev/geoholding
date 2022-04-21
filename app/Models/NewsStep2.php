<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bsw;
use App;


class NewsStep2 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_step_2';


	public function getAliasAttribute() {
        return $this -> { 'alias_'.App :: getLocale() };
    }


	public function getTitleAttribute() {
        return $this -> { 'title_'.App :: getLocale() };
    }


	public function getTextAttribute() {
        return $this -> { 'text_'.App :: getLocale() };
    }

	
	public function getFullUrlAttribute() {
        return $this -> newsStep1 -> fullUrl.'/'.$this -> alias;
    }


	public function getMetaTitleAttribute() {
        $bsw = Bsw :: getFullData();

        if($this -> { 'meta_title_'.App :: getLocale() }) {
            return $this -> { 'meta_title_'.App :: getLocale() };
        } else if($this -> { 'title_'.App :: getLocale() }) {
            return $this -> { 'title_'.App :: getLocale() };
        } else {
            return __('bsw.meta_title');
        }
    }


	public function getMetaDescriptionAttribute() {
        $bsw = Bsw :: getFullData();

        if($this -> { 'meta_description_'.App :: getLocale() }) {
            $textAsDesc = strip_tags($this -> { 'meta_description_'.App :: getLocale() });

            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else if($this -> { 'text_'.App :: getLocale() }) {
            $textAsDesc = strip_tags($this -> { 'text_'.App :: getLocale() });

            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else {
            return __('bsw.meta_description');
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


	public function newsStep3() {
        return $this -> hasMany(NewsStep3 :: class, 'parent', 'id');
    }


	public function newsStep1() {
        return $this -> hasOne(NewsStep1 :: class, 'id', 'parent') -> orderBy('rang', 'desc');
    }
}