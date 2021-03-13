<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('order.show')->with('order', $order);
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

        Order::create($request->only(['total']));

        return back()->with('success', 'Order created successfully!');
    }

    public function delete($id)
    {
        Order::destroy($id);

        return redirect()->route('home')->with('success', 'Elemento borrado exitosamente');
    }
}
