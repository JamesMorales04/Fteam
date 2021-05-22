<?php

namespace App\Http\Controllers;

use App\Interfaces\Billing;
use App\Mail\Payment;
use App\Models\User;
use App\Models\Food;
use App\Models\Ingredients;
use App\Models\Order;
use App\Models\OrderedFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lang;
use Srmklive\PayPal\Services\ExpressCheckout;

class ShoppingController extends Controller
{
    public function payment(Request $request)
    {
        $provider = new ExpressCheckout;

        $data = [];
        $cart = $this->cart($request);

        $data['items'] = [
            [
                'name' => 'codechief.org',
                'price' => $cart['data']['total'],
                'desc'  => 'Description goes herem',
                'qty' => 1,
            ],
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success', $request);
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $cart['data']['total'];

        $response = $provider->setExpressCheckout($data);

        return redirect($response['paypal_link']);
    }

    public function cancel()
    {
        dd('Sorry you payment is canceled');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $buy = $this->buy($request);
            return view('shopping.buy')->with('data', $buy->data);
        }
        $cart = $this->cart($request)->data;
        return view('shopping.cart')->with('data', $cart);
    }

    public function ingredients($id, Request $request)
    {
        $data = [];
        $food = Food::findOrFail($id);
        $data['food'] = $food;
        $ingredients = Ingredients::findMany($food['ingredients']);

        $data['ingredient'] = $ingredients;
        $data['name'] = [];
        foreach ($ingredients as $ingredient) {
            array_push($data['name'], $ingredient->getName());
        }

        return view('shopping.ingredient')->with('data', $data);
    }

    public function createPdf(Request $request)
    {
        $billInterface = app(Billing::class);
        $billInterface->billPDF($request);
    }

    public function sendEmail(Request $request)
    {
        $billInterface = app(Billing::class);
        $billInterface->billMail($request);
    }

    public function orderCart($id, $amount, &$data, &$total, $status)
    {
        if ($id) {
            $listFoodInCart = Food::findMany($id);
            foreach ($listFoodInCart as $food) {
                array_push($data['foods'], [$food, $amount[$food->getId()], $status]);
                $total = ($total + $food->getPrice()) * $amount[$food->getId()];
            }
        }
    }

    public function cart(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Store food';
        $data['foods'] = [];
        $total = 0;
        $idsFood = $request->session()->get('completFood');
        $idsIngredients = $request->session()->get('byIngredients');
        $amountFood = $request->session()->get('amountFood');
        $amountIngredients = $request->session()->get('amountIngredients');

        $this->orderCart($idsFood, $amountFood, $data, $total, false);
        $this->orderCart($idsIngredients, $amountIngredients, $data, $total, true);

        $data['total'] = $total;

        // dd($data);

        return view('shopping.cart')->with('data', $data);
    }

    public function add(Request $request)
    {
        if ($request['amount'] == 0) {
            return back();
        }
        $food = $request->session()->get('completFood');
        $food[$request['id']] = $request['id'];
        $request->session()->put('completFood', $food);

        $amount = $request->session()->get('amountFood');

        if ($amount == null) {
            $amount[$request['id']] = 0;
        }
        if (! array_key_exists($request['id'], $amount)) {
            $amount[$request['id']] = 0;
        }

        $amount[$request['id']] = $amount[$request['id']] + $request['amount'];
        $request->session()->put('amountFood', $amount);

        return back()->with('success', __('cart.addToCart'));
    }

    public function addAsIngresients(Request $request)
    {
        if ($request['amount'] == 0) {
            return back();
        }

        $food = $request->session()->get('byIngredients');
        $food[$request['id']] = [$request['id']];
        $request->session()->put('byIngredients', $food);

        $amount = $request->session()->get('amountIngredients');

        if ($amount == null) {
            $amount[$request['id']] = 0;
        }
        if (! array_key_exists($request['id'], $amount)) {
            $amount[$request['id']] = 0;
        }

        $amount[$request['id']] = $amount[$request['id']] + $request['amount'];
        $request->session()->put('amountIngredients', $amount);

        return back()->with('success', __('cart.addToCart'));
    }

    public function removeOne(Request $request)
    {
        if ($request['ingredients'] == 1) {
            $food = $request->session()->get('byIngredients');
            $amount = $request->session()->get('amountIngredients');
        }
        else {
            $food = $request->session()->get('completFood');
            $amount = $request->session()->get('amountFood');
        }

        if ($amount[$request['id']] > $request['amount']) {
            
            $amount[$request['id']] = $amount[$request['id']] - $request['amount'];
    
            if ($request['ingredients'] == 1) {
                $request->session()->put('amountIngredients', $amount);
            }
            else {
                $request->session()->put('amountFood', $amount);
            }
        }
        else {
            if ($request['ingredients'] == 1) {
                unset($food[$request['id']]);
                $request->session()->put('byIngredients', $food);
                unset($amount[$request['id']]);
                $request->session()->put('amountIngredients', $amount);
            }
            else {
                unset($food[$request['id']]);
                $request->session()->put('completFood', $food);
                unset($amount[$request['id']]);
                $request->session()->put('amountFood', $amount);
            }
        }
        return back()->with('success', __('cart.addToCart'));
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('completFood');
        $request->session()->forget('byIngredients');
        $request->session()->forget('amountFood');
        $request->session()->forget('amountIngredients');

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
                $orderedFood->setAmount($amount[$food->getId()]);
                $orderedFood->setSubTotal($food->getPrice() * $amount[$food->getId()]);
                $orderedFood->setOnlyIngredients($status);
                $orderedFood->setFoodName($food->getName());
                $orderedFood->setFoodId($food->getId());
                $orderedFood->setOrderId($order->getId());
                $orderedFood->save();
                array_push($data['food'], [$food->getName(), $food->getPrice(), $amount[$food->getId()], $status]);
                $total = ($total + $food->getPrice()) * $amount[$food->getId()];
            }
            $order->setTotal($total);
            $order->save();
        }

        return 0;
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $data['food'] = [];

        $order = new Order();
        $total = 0;
        $idsFood = $request->session()->get('completFood');
        $idsIngredients = $request->session()->get('byIngredients');
        $amountFood = $request->session()->get('amountFood');
        $amountIngredients = $request->session()->get('amountIngredients');

        if ($this->validateBalance($idsFood, $amountFood, $idsIngredients, $amountIngredients)) {
            return back()->with('success', __('cart.insufficientBalance'));
        }

        $this->validation($idsFood, $order, $amountFood, $data, $total, false);
        $this->validation($idsIngredients, $order, $amountIngredients, $data, $total, true);

        $data['total'] = $total;
        $request->session()->forget('completFood');
        $request->session()->forget('byIngredients');
        $request->session()->forget('amountFood');
        $request->session()->forget('amountIngredients');

        return view('shopping.buy')->with('data', $data);
    }

    public function validateBalance($idsFood, $amountFood, $idsIngredients, $amountIngredients)
    {
        $user = User::findOrFail(Auth::Id());
        $total = 0;
        $listFoodInCart = Food::findMany($idsFood);
        foreach ($listFoodInCart as $food) {
            $total = ($total + $food->getPrice()) * $amountFood[$food->getId()];
        }

        $listFoodInCart = Food::findMany($idsIngredients);
        foreach ($listFoodInCart as $food) {
            $total = ($total + $food->getPrice()) * $amountIngredients[$food->getId()];
        }
        $balance = $user->getBalance();
        if ($total <= $balance) {
            $user->setBalance($balance - $total);
            $user->save();
            return false;
        }
        else {
            return true;
        }
    }

}
