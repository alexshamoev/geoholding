<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\PhotoGalleryCategory;
use App\Models\PhotoGalleryImage;
use App\Widget;
use Illuminate\Http\Request;


class PhotoGalleryController extends Controller {
    private const PAGE_SLUG = 'photo-gallery';

    
    public static function getStep0($lang) {
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();

        PhotoGalleryCategory :: setLang($language -> title);

        Page :: setLang($language -> title);
        
        PhotoGalleryCategory :: setPageAlias($page -> alias);

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['photoGalleryStep0' => PhotoGalleryCategory :: where('published', 1) -> orderByDesc('rang') -> get()]);
        
        return view('modules.photo_gallery.step0', $data);
    }


    public static function getStep1($lang, $step0Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();

        PhotoGalleryCategory :: setLang($language -> title);
        PhotoGalleryImage :: setLang($language -> title);

        $parent = PhotoGalleryCategory :: where('alias_'.$language -> title, $step0Alias) -> first();

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['photoGalleryStep0' => PhotoGalleryCategory :: where('published', 1) -> orderByDesc('rang') -> get(),
                             'activePhotoGalleryCategory' => $parent,
                             'photoGalleryStep1' => PhotoGalleryImage :: where('published', 1) -> where('parent', $parent -> id) -> orderByDesc('rang') -> get()]);

        return view('modules.photo_gallery.step1', $data);
    }
}