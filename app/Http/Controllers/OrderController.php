<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductStep2;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function order(Request $request, $lang) {
        $orderCode = random_int(100000000, 999999999);
        $fullPrice = 0;
        $productsArray = [];
        $quantityArray = [];
        $quantityArray = $request->input('quantity');

        foreach($request->input('productId') as $key => $data) {
            $productsArray[$key] = ProductStep2::firstWhere('id', $data);
            $fullPrice += $productsArray[$key]->price * $quantityArray[$key];
        }

        $order = Order::create([
            'order_code' => $orderCode,
            'user_id' => Auth::user()->id,
            'delivery_type' => 'default',
            'full_price' => $fullPrice,
            'created_at' => date("Y-m-d H:i:s", strtotime('+4 hours')),
            'updated_at' => date("Y-m-d H:i:s", strtotime('+4 hours')),
        ]);

        return $this->orderSendEmail($lang, $productsArray, $quantityArray, $order);
    }


    public function orderSendEmail($lang, $products, $quantity, $order) {
        $emailData = [];
        $emailData['products'] = $products;
        $emailData['quantity'] = $quantity;
        $emailData['order'] = $order;
        $emailData['user'] = Auth::user();
        $emailData['language'] = $lang;

        MailController::orderEmail($emailData);
    }
}
