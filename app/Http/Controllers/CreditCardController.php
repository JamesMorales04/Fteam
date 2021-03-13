<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use Illuminate\Http\Request;

class CreditCardController extends Controller
{
    public function show($id)
    {
        try {
            $creditCard = CreditCard::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('creditCard.show')->with('creditCard', $creditCard);
    }

    public function save(Request $request)
    {
        CreditCard::validate($request);

        CreditCard::create($request->only(['cardName', 'securityCode', 'expirationDate', 'cardNumber']));

        return back()->with('success', 'Credit Card created successfully!');
    }

    public function create()
    {
        $data = [];

        $data['title'] = 'Create Credit Card';

        return view('creditCard.create')->with('data', $data);
    }

    public function update($id)
    {
        try {
            $creditCard = CreditCard::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('creditCard.update')->with('creditCard', $creditCard);
    }

    public function updateSave(Request $request)
    {
        try {
            $creditCard = CreditCard::findOrFail($request->get('cardId'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        $creditCard->cardName = $request->get('cardName');
        $creditCard->securityCode = $request->get('securityCode');
        $creditCard->expirationDate = $request->get('expirationDate');
        $creditCard->cardNumber = $request->get('cardNumber');

        $creditCard->save();

        return redirect()->route('home')->with('success', 'Elemento actualizado exitosamente');
    }

    public function delete($id)
    {
        CreditCard::destroy($id);

        return redirect()->route('home')->with('success', 'Elemento borrado exitosamente');
    }
}
