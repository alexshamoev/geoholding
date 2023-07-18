<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class HomeStep4 extends Model
{
    use HasFactory;

    protected $table = 'home_step_4';


    public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
    }


	public function getTextAttribute() 
    {
        return $this->{ 'text_'.App::getLocale() };
    }


    public function reasons()
    {
        return $this->hasMany(HomeStep5::class, 'top_level', 'id');
    }
}
