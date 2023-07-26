<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class HomeStep6 extends Model
{
    use HasFactory;

    protected $table = 'home_step_6';


    public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
    }
}
