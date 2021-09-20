<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\PhotoGalleryCategory;
use App\Widget;
use Illuminate\Http\Request;


class PhotoGalleryController extends Controller {
    public static function getStep0($language, $page) {
        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['photoGalleryStep0' => PhotoGalleryCategory :: where('published', 1) -> get()]);
        
        return view('modules.photo_gallery.step0', $data);
    }


    public static function getStep1($language, $page, $stepAlias) {
        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['photoGalleryStep0' => PhotoGalleryCategory :: where('published', 1) -> get(),
                             'activePhotoGalleryCategory' => PhotoGalleryCategory :: where('alias_'.$language -> title, $stepAlias) -> first()]);

        return view('modules.photo_gallery.step1', $data);
    }
}