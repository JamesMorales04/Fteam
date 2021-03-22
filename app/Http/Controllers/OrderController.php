<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showAll()
    {
        if (Auth::user()->getRole() === 'Administrador') {
            $order['orders'] = Order::all();

            foreach ($order['orders'] as $orderAux) {
                $order[$orderAux->getId()] = OrderedFood::where('order_id', $orderAux->getId())->get();
            }
        } else {
            $order['orders'] = Order::where('user_id', Auth::id())->get();

            foreach ($order['orders'] as $orderAux) {
                $order[$orderAux->getId()] = OrderedFood::where('order_id', $orderAux->getId())->get();
            }
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
