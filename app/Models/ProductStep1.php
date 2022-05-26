<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductStep2;
use App;

class ProductStep1 extends Model
{
    use HasFactory;

    protected $table = 'products_step_1';


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
        return $this->productStep0->fullUrl.'/'.$this->alias;
    }


	public function productStep2() {
        return $this->hasMany(ProductStep2::class, 'top_level', 'id');
    }


	public function productStep0() {
        return $this->hasOne(ProductStep0::class, 'id', 'top_level')->orderBy('rang', 'desc');
    }

    public function getFullUrl($lang) {
        return $this->productStep0->getFullUrl($lang).'/'.$this->{ 'alias_'.$lang };
    }
}
