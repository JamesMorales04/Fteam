<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use App\Models\Order;
use App\Models\OrderedFood;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        $data = [];
        try {
            $data['user'] = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        $data['card'] = $data['user']->CreditCard;

        $data['prueba'] = [];
        foreach ($data['card'] as $cards) {
            array_push($data['prueba'], $cards->getCardName());
        }

        return view('user.profile')->with('data', $data);
    }

    

    public function delete($id)
    {
        $data['card'] = CreditCard::where('user_id', $id)->delete();
        $data['order'] = Order::where('user_id', $id)->get();

        foreach ($data['order'] as $order) {
            $aux = OrderedFood::where('order_id', $order->getId())->get();
            foreach ($aux as $value) {
                $value->delete();
            }
            $order->delete();
        }

        User::destroy($id);

        return redirect()->route('home')->with('success', 'Elemento borrado exitosamente');
    }

    public function update($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('user.update')->with('user', $user);
    }

    public function updateSave(Request $request)
    {
        try {
            $user = User::findOrFail($request->get('UserId'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        $request['password'] = $user->getPassword();
        $request['role'] = $user->getRole();

        User::validate($request);

        $user->setName($request->get('name'));
        $user->setEmail($request->get('email'));
        $user->setAddress($request->get('address'));

        $user->save();

        return redirect()->route('user.show', ['id' => Auth::id()]);
    }
}
