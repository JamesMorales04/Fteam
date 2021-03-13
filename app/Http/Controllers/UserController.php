<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('user.profile')->with('user', $user);
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

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');

        $user->save();

        return back()->with('success', 'User created successfully!');
    }
}
