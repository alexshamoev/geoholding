<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;
use App\Models\ProductStep2;
use Auth;

class BasketController extends FrontController
{
    private const PAGE_SLUG = 'basket';

    public static function getStep0(Request $request, $lang) {
        if(Auth::check()) {
            $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
            $language = Language :: where('title', $lang) -> first();

            $data = array_merge(self :: getDefaultData($language,
                                                        $page), 
                                [
                                    'orderPage' => Page::firstWhere('slug', 'order'),
                                ]);

            return view('modules.basket.step0', $data);
        }

        return redirect()->route('getLogin', $lang);
    }


    public function getProducts(Request $request) {
        $product = ProductStep2::find((int)$request -> input('productId'));

        if($product) {
            $lang = $request -> input('lang');

            $lang = preg_replace("/[^A-Z]+/ui",
                                '',
                                $lang);

            \App::setLocale($lang);

            return response() -> json([
                'title' => $product->{ 'title_'.\App::getLocale() },
                'price' => $product->price,
            ]);
        } else {
            return  response() -> json(false);
        }
    }
}
