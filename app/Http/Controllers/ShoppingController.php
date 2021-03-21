<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingredients;
use App\Models\Order;
use App\Models\OrderedFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ShoppingController extends Controller
{
    public function ingredients($id, Request $request)
    {
        $data = [];
        $food = Food::findOrFail($id);
        $data['food'] = $food;
        $ingredients = Ingredients::findMany($food['ingredients']);

        $data['ingredient'] = $ingredients;
        $data['name'] = array();
        foreach ($ingredients as $ingredient) {
            array_push($data['name'], $ingredient->getName());
        }

        return view('shopping.ingredient')->with('data', $data);
    }


    public function createPdf(Request $request){
        $data=$request->get('data');
        set_time_limit(300);

        $pdf = PDF::loadView('shopping.pdf',$data);
        return $pdf->download('payment.pdf');
    }
    public function addIngredient(Request $request)
    {
        dd($request);

        return view('shopping.cart');

    }

    public function cart(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Store food';

        $listFoodInCart = [];
        $total = 0;
        $ids1 = $request->session()->get('food1');
        $ids2 = $request->session()->get('food2');
        if ($ids1) {
            $listFoodInCart = Food::findMany($ids1);
            foreach ($listFoodInCart as $food) {
                $total = $total + $food->getPrice();
            }
        }

        if ($ids2) {
            $listFoodInCart = Food::findMany($ids2);
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
        $food = $request->session()->get('food1');
        $food[$id] = $id;
        $request->session()->put('food1', $food);

        $amount = $request->session()->get('amount1');
        $amount = $amount + 1;
        $request->session()->put('amount1', $amount);

        return back();
    }

    public function addAsIngresients($id, Request $request)
    {
        $food = $request->session()->get('food2');
        $food[$id] = $id;
        $request->session()->put('food2', $food);

        $amount = $request->session()->get('amount2');
        $amount = $amount + 1;
        $request->session()->put('amount2', $amount);

        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('food1');
        $request->session()->forget('food2');
        $request->session()->forget('amount1');
        $request->session()->forget('amount2');

        return back();
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Buy';

        $order = new Order();
        $total = 0;
        $ids1 = $request->session()->get('food1');
        $ids2 = $request->session()->get('food2');
        $amount1 = $request->session()->get('amount1');
        $amount2 = $request->session()->get('amount2');
        // dd($ids1);
        if ($ids1) {
            $order->setTotal(0);
            $order->setUserId(Auth::Id());
            $order->save();
            $listFoodInCart = Food::findMany($ids1);

            foreach ($listFoodInCart as $food) {
                $orderedFood = new OrderedFood();
                $orderedFood->setAmount($amount1);
                $orderedFood->setSubTotal($food->getPrice());
                $orderedFood->setOnlyIngredients(false);
                $orderedFood->setFoodName($food->getName());
                $orderedFood->setFoodId($food->getId());
                $orderedFood->setOrderId($order->getId());
                $orderedFood->save();
                $total = $total + $food->getPrice();
            }
            $order->setTotal($total);
            $order->save();
            $request->session()->forget('food1');
        }

        if ($ids2) {
            $order->setTotal(0);
            $order->setUserId(Auth::Id());
            $order->save();
            $listFoodInCart = Food::findMany($ids2);

            $data['food']=array();
            foreach ($listFoodInCart as $food) {
                $orderedFood = new OrderedFood();
                $orderedFood->setAmount($amount2);
                $orderedFood->setSubTotal($food->getPrice());
                $orderedFood->setOnlyIngredients(true);
                $orderedFood->setFoodName($food->getName());
                $orderedFood->setFoodId($food->getId());
                $orderedFood->setOrderId($order->getId());
                $orderedFood->save();
                array_push($data['food'],[$food->getName(),$food->getPrice()]);
                $total = $total + $food->getPrice();
            }
            $order->setTotal($total);
            $order->save();
            $request->session()->forget('food2');
        }
        $data['total']=$total;

        $request->session()->forget('ingredients');
        $request->session()->forget('amount1');
        $request->session()->forget('amount2');

        return view('shopping.buy')->with("data", $data);
    }
}
