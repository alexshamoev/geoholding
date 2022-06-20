<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App;


class PageImage extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages_step_1';


	public function getTitleAttribute() {
        return $this->{ 'title_'.App::getLocale() };
    }


    public function page() {
        return $this->hasOne(page::class, 'id', 'top_level');
    }
}