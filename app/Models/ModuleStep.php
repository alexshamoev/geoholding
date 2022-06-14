<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ModuleStep extends Model {
    public function module() {
        return $this->hasOne(Module::class, 'id', 'top_level');
    }


    public function moduleBlock() {
        return $this->hasMany(ModuleBlock::class, 'top_level', 'id')->orderBy('rang', 'desc');
    }


    public function moduleParentStep() {
        return $this->hasOne(ModuleStep::class, 'id', 'parent_step_id');
    }
}