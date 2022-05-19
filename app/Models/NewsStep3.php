<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bsw;
use App;


class NewsStep3 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_step_3';


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
        return $this -> newsStep2 -> fullUrl.'/'.$this -> alias;
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
        if(file_exists(public_path('/storage/images/modules/news/step_3/meta_'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/photo_gallery/step_3/meta_'.$this -> { 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/news/step_3/'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/news/step_3/'.$this -> { 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }


	public function newsStep2() {
        return $this -> hasOne(NewsStep2 :: class, 'id', 'top_level');
    }


    public function getFullUrl($lang) {
        return $this->newsStep2->getFullUrl($lang).'/'.$this->{ 'alias_'.$lang };
    }
}