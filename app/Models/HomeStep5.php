<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class HomeStep5 extends Model
{
    use HasFactory;

    protected $table = 'home_step_5';


    public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
    }


	public function getTextAttribute() 
    {
        return $this->{ 'text_'.App::getLocale() };
    }
}
