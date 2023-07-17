<?php

namespace App\Models;

use App;
use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeStep0 extends Model
{
    use HasFactory;

    protected $table = 'home_step_0';
    
    private static $page;
    
    public static function setPage($page) 
    {
        self::$page = $page;
    }
    
    
    public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
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
        if(file_exists(public_path('/storage/images/modules/companies/81/meta_'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/companies/81/meta_'.$this->{ 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/companies/81/'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/companies/81/'.$this->{ 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }
    
    
	public function getFullUrlAttribute() 
    {
        return self::$page->fullUrl.'/'.$this->alias;
    }


    public function getFullUrl($lang) 
    {
        $mainAlias = Page::firstWhere('slug', 'company')->{'alias_'.$lang};
        
        return '/'.$lang.'/'.$mainAlias.'/'.config('activeCompany')->alias.'/'.self::$page->{ 'alias_'.$lang }.'/'.$this->{ 'alias_'.$lang };
    }


    public function services()
    {
        return $this->hasMany(HomeStep1::class, 'top_level', 'id');
    }
}
