<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Basket_item;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function ManagerOrderView(Request $request)
    {
        $status = $request->input('status_id');
        $orders = Orders::when($status, function ($querty, $status) {
            return $querty->where('status_id', $status);
        })
            ->with('user')
            ->get();
        $basket = Basket::all()->first();
        $basketItems = [];
        if ($basket) {
            $basketItems = Basket_item::join('products', 'basket_items.product_id', '=', 'products.id')
                ->where('basket_id', $basket->id)
                ->get(['products.product_name',  'products.product_price','basket_items.count']);
        }
        return view('managers.managerorder', compact('orders','basketItems'));
    }


    public function changeStatusOrder(Request $request, $orderId, $action)
    {
        $order = Orders::findOrFail($orderId);
        if ($order->status_id == 1) {
            if ($action == 'cancel') {
                $order->status_id = 3;
                $order->order_comment = $request->input('order_comment');
            } elseif ($action == 'confirm') {
                $order->status_id = 2;
            }
            $order->save();
            $message = ($action == 'cancel') ? 'отменён' : 'подтверждён';
            return redirect()->route('manager.order')->with('success', "Заказы успешно $message");
        }

    }
}
