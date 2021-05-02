<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showAll()
    {
        $order['orders'] = Order::where('user_id', Auth::id())->get();

        foreach ($order['orders'] as $orderAux) {
            $order[$orderAux->getId()] = $orderAux->OrderedFood;
        }

        return view('order.showAll')->with('orders', $order);
    }

    public function save(Request $request)
    {
        Order::validate($request);

        Order::create($request->only(['total', 'user_id']));

        return back()->with('success', 'Order created successfully!');
    }
}
