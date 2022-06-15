<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;
use App\Models\PhotoGalleryStep1;

class PhotoGalleryStep1Observer
{
    /**
     * Handle the PhotoGalleryStep1 "created" event.
     *
     * @param  \App\Models\PhotoGalleryStep1  $photoGalleryStep1
     * @return void
     */
    public function created(PhotoGalleryStep1 $photoGalleryStep1)
    {
        //
    }

    /**
     * Handle the PhotoGalleryStep1 "updated" event.
     *
     * @param  \App\Models\PhotoGalleryStep1  $photoGalleryStep1
     * @return void
     */
    public function updated(PhotoGalleryStep1 $photoGalleryStep1)
    {
        //
    }

    /**
     * Handle the PhotoGalleryStep1 "deleted" event.
     *
     * @param  \App\Models\PhotoGalleryStep1  $photoGalleryStep1
     * @return void
     */
    public function deleted(PhotoGalleryStep1 $photoGalleryStep1)
    {
        $file = 'public/images/modules/photo_gallery/34/'.$photoGalleryStep1->id.'.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }

        $file = 'public/images/modules/photo_gallery/34/'.$photoGalleryStep1->id.'_preview.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }
    }

    /**
     * Handle the PhotoGalleryStep1 "restored" event.
     *
     * @param  \App\Models\PhotoGalleryStep1  $photoGalleryStep1
     * @return void
     */
    public function restored(PhotoGalleryStep1 $photoGalleryStep1)
    {
        //
    }

    /**
     * Handle the PhotoGalleryStep1 "force deleted" event.
     *
     * @param  \App\Models\PhotoGalleryStep1  $photoGalleryStep1
     * @return void
     */
    public function forceDeleted(PhotoGalleryStep1 $photoGalleryStep1)
    {
        //
    }
}
