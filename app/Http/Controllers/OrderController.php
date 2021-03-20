<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show($id)
    {
        try {
            $orderBase = Order::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        $order['order'] = OrderedFood::where('order_id',$id)->get();

        $order['orderBase'] = $orderBase;


        return view('order.show')->with('order', $order);
    }

    public function showAll(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('order.showAll')->with('orders', $orders);
    }


    public function create()
    {
        $data = []; //to be sent to the view

        $data['title'] = 'Create user';

        return view('order.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Order::validate($request);

        Order::create($request->only(['total','user_id']));

        return back()->with('success', 'Order created successfully!');
    }

    public function delete($id)
    {
        Order::destroy($id);

        return redirect()->route('home')->with('success', 'Elemento borrado exitosamente');
    }
}
