<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partners_step_0';


	private static $lang;


	public static function setLang($value) {
		self :: $lang = $value;
	}


	public function getTitleAttribute() {
        return $this -> { 'title_'.self :: $lang };
    }
}
