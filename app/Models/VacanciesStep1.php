<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class VacanciesStep1 extends Model
{
    use HasFactory;

    protected $table = 'vacancies_step_1';
    

	public function getAliasAttribute() 
    {
        return $this->{ 'alias_'.App::getLocale() };
    }


    public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
    }


    public function getLocationAttribute() 
    {
        return $this->{ 'location_'.App::getLocale() };
    }


    public function getTextAttribute() 
    {
        return $this->{ 'text_'.App::getLocale() };
    }


    
    public function getMetaTitleAttribute() 
    {
        if($this->{ 'meta_title_'.App::getLocale() }) {
            return $this->{ 'meta_title_'.App::getLocale() } ;
        } else {
            return $this->{ 'title_'.App::getLocale() };
        }
    }


	public function getMetaDescriptionAttribute() 
    {
        if($this->{ 'meta_description_'.App::getLocale() }) {
            $textAsDesc = strip_tags($this->{ 'meta_description_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else {
            $textAsDesc = strip_tags($this->{ 'text_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        }
    }


    public function getMetaUrlAttribute() 
    {
        if(file_exists(public_path('/storage/images/modules/companies/91/meta_'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/companies/91/meta_'.$this->{ 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/companies/91/'.$this->{ 'id' }.'.png'))) {
            return '/storage/images/modules/companies/91/'.$this->{ 'id' }.'.png';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }


    public function getFullUrlAttribute() 
    {
        return $this->vacanciesStep0->fullUrl.'/'.$this->alias;
    }


    public function getFullUrl($lang) 
    {
        // $mainAlias = Page::firstWhere('slug', 'company')->{'alias_'.App :: getLocale()};
        
        // return '/'.$lang.'/'.$mainAlias.'/'.config('activeCompany')->alias.'/'.self::$page->{ 'alias_'.$lang }.'/'.$this->{ 'alias_'.$lang };
    }


    public function vacanciesStep0() 
    {
        return $this->hasOne(VacanciesStep0 :: class, 'id', 'top_level');
    }
}
