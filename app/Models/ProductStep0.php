<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use App\Models\ProductStep1;
use app;

class ProductStep0 extends Model {
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_step_0';

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


	public function getTextAttribute() {
        return $this->{ 'text_'.App::getLocale() };
    }

    
	public function getFullUrlAttribute() {
        return self::$page->fullUrl.'/'.$this->alias;
    }


	public function productStep1() {
        return $this->hasMany(ProductStep1::class, 'top_level', 'id')->orderBy('rang', 'desc');
    }


    public function getFullUrl($lang) {
        return '/'.$lang.'/'.self::$page->{ 'alias_'.$lang }.'/'.$this->{ 'alias_'.$lang };
    }
}
