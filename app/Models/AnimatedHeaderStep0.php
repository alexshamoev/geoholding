<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimatedHeaderStep0 extends Model
{
    use HasFactory;

    protected $table = 'animated_header_step_0';
    
    public function getTitleAttribute() {
        return $this -> { 'title_'.App :: getLocale() };
    }
}
