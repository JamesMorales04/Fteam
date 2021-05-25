<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Reviews;
use App\Models\User;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.adminPanel');
    }

    public function showAllOrdersAdmin()
    {
        $order['orders'] = Order::All();

        foreach ($order['orders'] as $orderAux) {
            $order[$orderAux->getId()] = $orderAux->OrderedFood;
        }

        return view('admin.showAllOrders')->with('orders', $order);
    }

    public function showAllUsersAdmin()
    {
        $data = [];

        $data['users'] = User::all();

        return view('admin.showAllUsers')->with('data', $data);
    }

    public function showAllFood()
    {
        $data['food'] = Food::orderBy('id')->get();
        $prom = [];
        foreach ($data['food'] as $food) {
            $prom[$food->getId()] = [Reviews::where('food_id', $food->getId())->avg('rating'), $food];
            if ($prom[$food->getId()][0] == null) {
                $prom[$food->getId()][0] = 0;
            }
        }

        return view('admin.showAllFood')->with('data', $prom);
    }
}
