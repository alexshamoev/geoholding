<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;
use App\Models\PhotoGalleryStep0;
use App\Models\PhotoGalleryStep1;

class PhotoGalleryController extends FrontController {
    private const PAGE_SLUG = 'photo-gallery';

    
    public static function getStep0($lang) {
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();

        $data = array_merge(self :: getDefaultData($language,
                                                    $page),
                            [
                                'photoGalleryStep0' => PhotoGalleryStep0 :: orderByDesc('rang') -> get()
                            ]);

        return view('modules.photo_gallery.step0', $data);
    }

    
    public static function getStep1($lang, $step0Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();

        $activeCategory = PhotoGalleryStep0 :: where('alias_'.$language -> title, $step0Alias) -> first();

        $data = array_merge(self :: getDefaultData($language,
                                                    $page,
                                                    $activeCategory),
                            [
                                'activeCategory' => $activeCategory
                            ]);

        return view('modules.photo_gallery.step1', $data);
    }
}