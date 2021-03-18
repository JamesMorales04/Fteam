<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        CreditCard::create($request->only(['cardName', 'securityCode', 'expirationMonth','expirationYear', 'cardNumber', 'user_id']));

        return redirect()->route('user.show', ['id'=>Auth::id()]);
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

        $creditCard->setCardName($request->get('cardName'));
        $creditCard->setSecurityCode($request->get('securityCode'));
        $creditCard->setExpirationMonth($request->get('expirationMonth'));
        $creditCard->setExpirationYear($request->get('expirationYear'));
        $creditCard->setCardNumber($request->get('cardNumber'));

        $creditCard->save();

        return redirect()->route('user.show', ['id'=>Auth::id()]);
    }

    public function delete($id)
    {
        CreditCard::destroy($id);

        return redirect()->route('user.show', ['id'=>Auth::id()]);
    }
}
