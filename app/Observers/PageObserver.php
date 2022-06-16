<?php

namespace App\Observers;

use App\Models\Page;

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
        // $file = 'public/images/modules/photo_gallery/2/'.$photoGalleryStep0->id.'.jpg';

        // if(Storage::exists($file)) {
        //     Storage::delete($file);
        // }

        // $file = 'public/images/modules/photo_gallery/2/meta_'.$photoGalleryStep0->id.'.jpg';

        // if(Storage::exists($file)) {
        //     Storage::delete($file);
        // }

        // foreach($photoGalleryStep0->photoGalleryStep1 as $data) {
        //     PhotoGalleryStep1::destroy($data -> id);
        // }
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
