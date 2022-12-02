<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;
use App\Models\PhotoGalleryStep0;

class PhotoGalleryController extends FrontController {
    private const PAGE_SLUG = 'photo-gallery';
    private static $page;


    public function __construct() {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
        
        PhotoGalleryStep0::setPage(self::$page);
    }

    
    public static function getStep0($lang) {
        $language = Language::where('title', $lang)->first();

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                                'photoGalleryStep0' => PhotoGalleryStep0::orderByDesc('rang')->get()
                            ]);

        return view('modules.photo_gallery.step0', $data);
    }

    
    public static function getStep1($lang, $step0Alias) {
        $language = Language::where('title', $lang)->first();

        $activeCategory = PhotoGalleryStep0::where('alias_'.$language->title, $step0Alias)->first();

        if($activeCategory) {
            $data = array_merge(self::getDefaultData($language,
                                                        self::$page,
                                                        $activeCategory),
                                [
                                    'activeCategory' => $activeCategory
                                ]);

            return view('modules.photo_gallery.step1', $data);
        }else {
            return redirect()->route('photo-gallery', $lang);
        }
    }
}