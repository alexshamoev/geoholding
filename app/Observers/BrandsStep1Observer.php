<?php

namespace App\Observers;

use App\Models\BrandsStep1;
use Illuminate\Support\Facades\Storage;

class BrandsStep1Observer
{
    /**
     * Handle the BrandsStep1 "created" event.
     *
     * @param  \App\Models\BrandsStep1  $brandsStep1
     * @return void
     */
    public function created(BrandsStep1 $brandsStep1)
    {
        //
    }

    /**
     * Handle the BrandsStep1 "updated" event.
     *
     * @param  \App\Models\BrandsStep1  $brandsStep1
     * @return void
     */
    public function updated(BrandsStep1 $brandsStep1)
    {
        //
    }

    /**
     * Handle the BrandsStep1 "deleted" event.
     *
     * @param  \App\Models\BrandsStep1  $brandsStep1
     * @return void
     */
    public function deleted(BrandsStep1 $brandsStep1)
    {
        $file = 'public/images/modules/companies/89/'.$brandsStep1->id.'.png';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }
    }
    
    /**
     * Handle the BrandsStep1 "restored" event.
     *
     * @param  \App\Models\BrandsStep1  $brandsStep1
     * @return void
     */
    public function restored(BrandsStep1 $brandsStep1)
    {
        //
    }

    /**
     * Handle the BrandsStep1 "force deleted" event.
     *
     * @param  \App\Models\BrandsStep1  $brandsStep1
     * @return void
     */
    public function forceDeleted(BrandsStep1 $brandsStep1)
    {
        //
    }
}
