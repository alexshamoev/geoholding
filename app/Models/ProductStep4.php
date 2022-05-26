<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class ProductStep4 extends Model
{
    use HasFactory;

    protected $table = 'products_step_4';


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
        return $this -> productStep2 -> fullUrl.'/'.$this -> alias;
    }


	public function productStep2() {
        return $this -> hasOne(ProductStep2 :: class, 'id', 'top_level');
    }


    public function getFullUrl($lang) {
        return $this->productStep2->getFullUrl($lang).'/'.$this->{ 'alias_'.$lang };
    }
}
