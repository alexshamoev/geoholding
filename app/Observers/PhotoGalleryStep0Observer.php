<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;
use App\Models\PhotoGalleryStep0;
use App\Models\PhotoGalleryStep1;

class PhotoGalleryStep0Observer
{
    /**
     * Handle the PhotoGalleryStep0 "created" event.
     *
     * @param  \App\Models\PhotoGalleryStep0  $photoGalleryStep0
     * @return void
     */
    public function created(PhotoGalleryStep0 $photoGalleryStep0)
    {
        //
    }

    /**
     * Handle the PhotoGalleryStep0 "updated" event.
     *
     * @param  \App\Models\PhotoGalleryStep0  $photoGalleryStep0
     * @return void
     */
    public function updated(PhotoGalleryStep0 $photoGalleryStep0)
    {
        //
    }

    /**
     * Handle the PhotoGalleryStep0 "deleted" event.
     *
     * @param  \App\Models\PhotoGalleryStep0  $photoGalleryStep0
     * @return void
     */
    public function deleted(PhotoGalleryStep0 $photoGalleryStep0)
    {
        $file = 'public/images/modules/photo_gallery/2/'.$photoGalleryStep0->id.'.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }

        $file = 'public/images/modules/photo_gallery/2/meta_'.$photoGalleryStep0->id.'.jpg';

        if(Storage::exists($file)) {
            Storage::delete($file);
        }

        foreach($photoGalleryStep0->photoGalleryStep1 as $data) {
            PhotoGalleryStep1::destroy($data -> id);
        }
    }

    /**
     * Handle the PhotoGalleryStep0 "restored" event.
     *
     * @param  \App\Models\PhotoGalleryStep0  $photoGalleryStep0
     * @return void
     */
    public function restored(PhotoGalleryStep0 $photoGalleryStep0)
    {
        //
    }

    /**
     * Handle the PhotoGalleryStep0 "force deleted" event.
     *
     * @param  \App\Models\PhotoGalleryStep0  $photoGalleryStep0
     * @return void
     */
    public function forceDeleted(PhotoGalleryStep0 $photoGalleryStep0)
    {
        //
    }
}
