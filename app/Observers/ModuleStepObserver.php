<?php

namespace App\Observers;

use App\Models\ModuleStep;
use App\Models\ModuleBlock;

class ModuleStepObserver
{
    /**
     * Handle the ModuleStep "created" event.
     *
     * @param  \App\Models\ModuleStep  $moduleStep
     * @return void
     */
    public function created(ModuleStep $moduleStep)
    {
        //
    }

    /**
     * Handle the ModuleStep "updated" event.
     *
     * @param  \App\Models\ModuleStep  $moduleStep
     * @return void
     */
    public function updated(ModuleStep $moduleStep)
    {
        //
    }

    /**
     * Handle the ModuleStep "deleted" event.
     *
     * @param  \App\Models\ModuleStep  $moduleStep
     * @return void
     */
    public function deleted(ModuleStep $moduleStep)
    {
        foreach($moduleStep -> moduleBlock as $data) {
            ModuleBlock :: destroy($data -> id);
        }
    }

    /**
     * Handle the ModuleStep "restored" event.
     *
     * @param  \App\Models\ModuleStep  $moduleStep
     * @return void
     */
    public function restored(ModuleStep $moduleStep)
    {
        //
    }

    /**
     * Handle the ModuleStep "force deleted" event.
     *
     * @param  \App\Models\ModuleStep  $moduleStep
     * @return void
     */
    public function forceDeleted(ModuleStep $moduleStep)
    {
        //
    }
}
