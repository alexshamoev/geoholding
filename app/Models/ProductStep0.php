<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use App\Models\ProductStep1;
use app;

class ProductStep0 extends Model
{
    use HasFactory;

    protected $table = 'products_step_0';

    protected static $pageSlug = 'products';


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
        $page = Page::where('slug', self::$pageSlug)->first();

        return $page->fullUrl.'/'.$this->alias;
    }

	public function productStep1() {
        return $this->hasMany(ProductStep1::class, 'top_level', 'id')->orderBy('rang', 'desc');
    }


    public function getFullUrl($lang) {
        $page = Page::where('slug', self::$pageSlug)->first();

        return '/'.$lang.'/'.$page->{ 'alias_'.$lang }.'/'.$this->{ 'alias_'.$lang };
    }
}
