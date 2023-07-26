<?php

namespace App\Observers;

use App\Models\HomeStep6;
use Illuminate\Support\Facades\Storage;

class HomeStem6Observer
{
    /**
     * Handle the HomeStep6 "created" event.
     *
     * @param  \App\Models\HomeStep6  $homeStep6
     * @return void
     */
    public function created(HomeStep6 $homeStep6)
    {
        //
    }

    /**
     * Handle the HomeStep6 "updated" event.
     *
     * @param  \App\Models\HomeStep6  $homeStep6
     * @return void
     */
    public function updated(HomeStep6 $homeStep6)
    {
        //
    }

    /**
     * Handle the HomeStep6 "deleted" event.
     *
     * @param  \App\Models\HomeStep6  $homeStep6
     * @return void
     */
    public function deleted(HomeStep6 $homeStep6)
    {
        $file = 'public/images/modules/companies/87/'.$homeStep6->id.'.png';
        
        if(Storage::exists($file)) {
            Storage::delete($file);
        }
    }

    /**
     * Handle the HomeStep6 "restored" event.
     *
     * @param  \App\Models\HomeStep6  $homeStep6
     * @return void
     */
    public function restored(HomeStep6 $homeStep6)
    {
        //
    }

    /**
     * Handle the HomeStep6 "force deleted" event.
     *
     * @param  \App\Models\HomeStep6  $homeStep6
     * @return void
     */
    public function forceDeleted(HomeStep6 $homeStep6)
    {
        //
    }
}
