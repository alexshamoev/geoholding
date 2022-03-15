<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App;


class Partner extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partners_step_0';


	public function getTitleAttribute() {
        return $this -> { 'title_'.App :: getLocale() };
    }
}
