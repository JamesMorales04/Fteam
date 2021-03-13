<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
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

        $data['card'] = CreditCard::where('user_id', $id)->get();

        return view('user.profile')->with('data', $data);
    }

    public function delete($id)
    {
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

        $user->setName($request->get('name'));
        $user->setEmail($request->get('email'));
        $user->setAddress($request->get('address'));

        $user->save();

        return redirect()->route('user.show', ['id'=>Auth::id()]);
    }
}
