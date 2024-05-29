<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Basket_item;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrdersController extends Controller
{

    public function orderCreate(Request $request)
    {
        $user = Auth::user();
        $totalCount = 0;
        $basket = Basket::where('user_id', $user->id)->first();
        foreach ($basket->basketItems as $item) {
            $totalCount += $item->count();
        }

        Orders::create([
            'order_count' => $totalCount,
            'status_id' => 1,
            'user_id' => $user->id,
            'type_payment'=>$request['type_payment'],
            'address'=>$request['address'],
            'order_comment' => '',
        ]);
        return redirect()->route('main')->with(['orderCreateSuccess' => true]);
    }

    public function orderView()
    {

        $user = Auth::user();
        $basket = Basket::where('user_id', Auth::id())->first();
        $basketItems = [];
        if ($basket) {
            $basketItems = Basket_item::join('products', 'basket_items.product_id', '=', 'products.id')
                ->where('basket_id', $basket->id)
                ->get(['products.product_name', 'products.product_photo', 'products.product_price','basket_items.count']);
        }
        $orders = Orders::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('users.order', compact('orders', 'basketItems'));

    }

    public function orderRemove(Orders $order)
    {
        if ($order->status_id == 1){
            $order->delete();
            return redirect()->route('orders')->with('orderDeleteSuccess', true);
        }
    }
}
