<?php

namespace App\Observers;

use App\Models\Module;
use App\Models\ModulesIncludesValue;
use App\Models\ModulesNotIncludesValue;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function created(Page $page)
    {
        //
    }

    /**
     * Handle the Page "updated" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function updated(Page $page)
    {
        //
    }

    /**
     * Handle the Page "deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        $file = 'public/images/modules/pages/55/'.$page->id.'.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }

        $file = 'public/images/modules/pages/55/meta_'.$page->id.'.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }

        // Update page_id field in modules table
            $modules = Module::where('page_id', $page->id)->get();

            foreach($modules as $module) {
                $module->page_id = 0;
                $module->include_type = 4;
                $module->save();
            }
        //
    }

    /**
     * Handle the Page "restored" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        //
    }

    /**
     * Handle the Page "force deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        //
    }
}
