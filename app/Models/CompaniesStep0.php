<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompaniesStep0 extends Model
{
    use HasFactory;

    protected $table = 'companies_step_0';
    
    private static $page;


    public static function setPage($page) 
    {
        self::$page = $page;
    }


	public function getAliasAttribute() 
    {
        return $this->{ 'alias_'.App::getLocale() };
    }


	public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
    }


    public function getFullUrlAttribute() 
    {
        return self::$page->fullUrl.'/'.$this->alias;
    }

    
    public function getFullUrl($lang) 
    {
        return '/'.$lang.'/'.self::$page->{ 'alias_'.$lang }.'/'.$this->{ 'alias_'.$lang };
    }
}
