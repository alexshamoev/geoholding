<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class ProductStep2 extends Model
{
    use HasFactory;

    protected $table = 'products_step_2';


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
        return $this->productStep1->fullUrl.'/'.$this -> alias;
    }


	public function productStep3() {
        return $this->hasMany(ProductStep3::class, 'top_level', 'id');
    }
    

    public function productStep4() {
        return $this->hasMany(ProductStep4::class, 'top_level', 'id');
    }


	public function productStep1() {
        return $this->hasOne(ProductStep1::class, 'id', 'top_level') -> orderBy('rang', 'desc');
    }

    public function getFullUrl($lang) {
        return $this->productStep1->getFullUrl($lang).'/'.$this->{ 'alias_'.$lang };
    }
}
