<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyStep0 extends Model
{
    use HasFactory;

    protected $table = 'company_step_0';
    
    private static $page;


    public static function setPage($page) {
        self::$page = $page;
    }


	public function getAliasAttribute() {
        return $this->{ 'alias_'.App::getLocale() };
    }


	public function getTitleAttribute() {
        return $this->{ 'title_'.App::getLocale() };
    }

}
