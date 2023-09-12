<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class VacanciesStep0 extends Model
{
    use HasFactory;

    protected $table = 'vacancies_step_0';
    
    private static $page;
    
    public static function setPage($page) 
    {
        self::$page = $page;
    }
    
    
    public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
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
            $textAsDesc = strip_tags($this->{ 'title_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        }
    }


    public function getMetaUrlAttribute() 
    {
        if(file_exists(public_path('/storage/images/modules/companies/90/meta_'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/companies/90/meta_'.$this->{ 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/companies/90/'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/companies/90/'.$this->{ 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }

    
	public function getFullUrlAttribute() 
    {
        $lang = App::getLocale();
        $mainAlias = Page::firstWhere('slug', 'company')->{'alias_'.App :: getLocale()};
        
        return '/'.$lang.'/'.$mainAlias.'/'.config('activeCompany')->alias.'/'.self::$page->{ 'alias_'.$lang };
        // return self::$page->fullUrl.'/'.$this->alias;
    }


    public function getFullUrl($lang) 
    {
        $mainAlias = Page::firstWhere('slug', 'company')->{'alias_'.App :: getLocale()};
        
        return '/'.$lang.'/'.$mainAlias.'/'.config('activeCompany')->alias.'/'.self::$page->{ 'alias_'.$lang }.'/'.$this->{ 'alias_'.$lang };
    }


    public function vacancies()
    {
        return $this->hasMany(VacanciesStep1::class, 'top_level', 'id');
    }
}
