<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class HomeStep3 extends Model
{
    use HasFactory;
    
    protected $table = 'home_step_3';


    public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
    }
}
