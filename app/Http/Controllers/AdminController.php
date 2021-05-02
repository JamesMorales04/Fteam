<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
}
