<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductStep2;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Page;
use App\Models\language;
use Auth;

class OrdersController extends FrontController {
    private const PAGE_SLUG = 'orders';
    private static $page;


    public function __construct() {
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
    }


    public static function getStep0($lang) {
        if(Auth::check()) {
            $language = Language::firstWhere('title', $lang);

            $data = self::getDefaultData($language,
                                         self::$page);

            return view('modules.orders.step0', $data);
        }

        return redirect()->route('getLogin', $lang);
    }


    public function order(Request $request, $lang) {
        $orderCode = random_int(100000000, 999999999);
        $fullPrice = 0;
        $productsArray = [];
        $quantityArray = $request->input('quantity');

        foreach($request->input('productIds') as $key => $data) {
            $productsArray[$key] = ProductStep2::firstWhere('id', $data);
            $fullPrice += $productsArray[$key]->price * $quantityArray[$key];
        }

        // dd($orderCode, $fullPrice, $productsArray, $quantityArray);

        $order = Order::create([
            'order_code' => $orderCode,
            'user_id' => Auth::user()->id,
            'delivery_type' => 'default',
            'full_price' => $fullPrice,
            'created_at' => date("Y-m-d H:i:s", strtotime('+4 hours')),
            'updated_at' => date("Y-m-d H:i:s", strtotime('+4 hours')),
        ]);

        foreach($request->input('productIds') as $key => $data) {
            $orderProducts = OrderProducts::create([
                'orders_id' => $order->id,
                'product_id' => $data,
                'quantity' => $quantityArray[$key],
                'created_at' => date("Y-m-d H:i:s", strtotime('+4 hours')),
                'updated_at' => date("Y-m-d H:i:s", strtotime('+4 hours')),
            ]);
        }


        $emailData = [];
        $emailData['products'] = $productsArray;
        $emailData['quantity'] = $quantityArray;
        $emailData['order'] = $order;
        $emailData['user'] = Auth::user();
        $emailData['language'] = $lang;

        MailController::orderEmail($emailData);

        $page = Page::where('slug', 'basket')->first();
        $language = Language::where('title', $lang)->first();

        $data = array_merge(self::getDefaultData($language,
                                                    $page), 
                            [
                                'orderPage' => Page::firstWhere('slug', 'order'),
                            ]);

        
        $homePage = Page::firstWhere('slug', 'home');

        $request->session()->flash('orderSuccessStatus', __('bsw.orderSuccessStatus'));

        return redirect($homePage->fullUrl);
    }
}