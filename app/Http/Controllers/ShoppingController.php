<?php

namespace App\Http\Controllers;

use App\Models\food;
use App\Models\Order;
use App\Models\OrderedFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function cart(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Store food';

        $listFoodInCart = [];
        $total = 0;
        $ids = $request->session()->get('food');
        if ($ids) {
            $listFoodInCart = Food::findMany($ids);
            foreach ($listFoodInCart as $food) {
                $total = $total + $food->getPrice();
            }
        }
        $data['total'] = $total;
        $data['foods'] = $listFoodInCart;

        return view('shopping.cart')->with('data', $data);
    }

    public function add($id, Request $request)
    {
        $food = $request->session()->get('food');
        $food[$id] = $id;
        $request->session()->put('food', $food);

        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('food');

        return back();
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Buy';

        $order = new Order();
        $total = 0;
        $ids = $request->session()->get('food');

        if ($ids) {
            $order->setTotal(0);
            $order->setUserId(Auth::Id());
            $order->save();
            $listFoodInCart = Food::findMany($ids);

            foreach ($listFoodInCart as $food) {
                $orderedFood = new OrderedFood();
                $orderedFood->setAmount(1);
                $orderedFood->setSubTotal($food->getPrice());
                $orderedFood->setFoodName($food->getName());
                $orderedFood->setFoodId($food->getId());
                $orderedFood->setOrderId($order->getId());
                $orderedFood->save();
                $total = $total + $food->getPrice();
            }
            $order->setTotal($total);
            $order->save();
            $request->session()->forget('food');
        }

        return view('shopping.buy')->with('data', $data);
    }
}
