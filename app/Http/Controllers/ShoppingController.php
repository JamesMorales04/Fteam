<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingredients;
use App\Models\Order;
use App\Models\OrderedFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lang;
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

    public function orderCart($id, $amount, &$data, &$total)
    {
        if ($id) {
            $listFoodInCart = Food::findMany($id);
            foreach ($listFoodInCart as $food) {
                array_push($data['foods'],[$food, $amount]);
                $total = ($total + $food->getPrice())*$amount;
            }
        }
        
        
    }

    public function cart(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Store food';
        $data['foods'] = array();
        $listFoodInCart = [];
        $total = 0;
        $ids1 = $request->session()->get('food1');
        $ids2 = $request->session()->get('food2');
        $amount1 = $request->session()->get('amount1');
        $amount2 = $request->session()->get('amount2');
        
        $this->orderCart($ids1,$amount1,$data,$total);
        $this->orderCart($ids2,$amount2,$data,$total);

        $data['total'] = $total;
        
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

        return back()->with('success', Lang::get('messages.addToCart'));
    }

    public function addAsIngresients($id, Request $request)
    {
        $food = $request->session()->get('food2');
        $food[$id] = $id;
        $request->session()->put('food2', $food);

        $amount = $request->session()->get('amount2');
        $amount = $amount + 1;
        $request->session()->put('amount2', $amount);

        return back()->with('success', Lang::get('messages.addToCart'));
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('food1');
        $request->session()->forget('food2');
        $request->session()->forget('amount1');
        $request->session()->forget('amount2');

        return back();
    }
    
    public function validation($ids, &$order, $amount, &$data, &$total, $status)
    {
        if ($ids) {
            $order->setTotal(0);
            $order->setUserId(Auth::Id());
            $order->save();
            $listFoodInCart = Food::findMany($ids);

            foreach ($listFoodInCart as $food) {
                $orderedFood = new OrderedFood();
                $orderedFood->setAmount($amount);
                $orderedFood->setSubTotal($food->getPrice()*$amount);
                $orderedFood->setOnlyIngredients($status);
                $orderedFood->setFoodName($food->getName());
                $orderedFood->setFoodId($food->getId());
                $orderedFood->setOrderId($order->getId());
                $orderedFood->save();
                array_push($data['food'],[$food->getName(),$food->getPrice()]);
                $total = ($total + $food->getPrice())*$amount;
            }
            $order->setTotal($total);
            $order->save();
            
        }
        return 0;
    }
    public function cosa()
    {
        return 0;
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Buy';
        $data['food']=array();
        $order = new Order();
        $total = 0;
        $ids1 = $request->session()->get('food1');
        $ids2 = $request->session()->get('food2');
        $amount1 = $request->session()->get('amount1');
        $amount2 = $request->session()->get('amount2');
        
        $this->validation($ids1, $order, $amount1, $data, $total, false);
        $this->validation($ids2, $order, $amount2, $data, $total, true);

        $data['total']=$total;
        $request->session()->forget('food2');
        $request->session()->forget('food1');
        $request->session()->forget('amount1');
        $request->session()->forget('amount2');

        return view('shopping.buy')->with("data", $data);
    }

}
