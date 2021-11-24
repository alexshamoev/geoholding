<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\PhotoGalleryStep0;
use App\Models\PhotoGalleryStep1;
use App\Widget;
use Illuminate\Http\Request;


class PhotoGalleryController extends Controller {
    private const PAGE_SLUG = 'photo-gallery';

    
    public static function getStep0($lang) {
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();
        
        Page :: setLang($language -> title);

        PhotoGalleryStep0 :: setLang($language -> title);
        PhotoGalleryStep0 :: setPageAlias($page -> alias);

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['photoGalleryStep0' => PhotoGalleryStep0 :: where('published', 1) -> orderByDesc('rang') -> get()]);

        return view('modules.photo_gallery.step0', $data);
    }


    public static function getStep1($lang, $step0Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();

        PhotoGalleryStep0 :: setLang($language -> title);
        PhotoGalleryStep1 :: setLang($language -> title);

        $activeCategory = PhotoGalleryStep0 :: where('alias_'.$language -> title, $step0Alias) -> first();

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['photoGalleryStep0' => PhotoGalleryStep0 :: where('published', 1) -> orderByDesc('rang') -> get(),
                             'activePhotoGalleryStep0' => $activeCategory,
                             'photoGalleryStep1' => PhotoGalleryStep1 :: where('published', 1) -> where('parent', $activeCategory -> id) -> orderByDesc('rang') -> get()]);

        return view('modules.photo_gallery.step1', $data);
    }
}