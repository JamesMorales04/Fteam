<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CreditCardController extends Controller
{
    public function show($id)
    {
        try {
            $creditCard = CreditCard::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', __('general.notFound'));
        }
        try {
            $user = User::findOrFail(Auth::id());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', __('general.notFound'));
        }
        
        return view('creditCard.show')->with('creditCard', $creditCard)->with('user', $user);
    }

    public function save(Request $request)
    {
        CreditCard::validate($request);
        CreditCard::create($request->only(['cardName', 'securityCode', 'expirationMonth',
        'expirationYear', 'cardNumber', 'user_id', ]));

        return redirect()->route('user.show', ['id' => Auth::id()]);
    }

    public function create()
    {
        try {
            $user = User::findOrFail(Auth::id());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', __('general.notFound'));
        }
        $data = [];

        $data['title'] = 'Create Credit Card';

        return view('creditCard.create')->with('data', $data)->with('user', $user);
    }

    public function update($id)
    {
        try {
            $creditCard = CreditCard::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', __('general.notFound'));
        }
        try {
            $user = User::findOrFail(Auth::id());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', __('general.notFound'));
        }

        return view('creditCard.update')->with('creditCard', $creditCard)->with('user', $user);
    }

    public function updateSave(Request $request)
    {
        try {
            $creditCard = CreditCard::findOrFail($request->get('cardId'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', __('general.notFound'));
        }

        $request['user_id'] = Auth::id();

        CreditCard::validate($request);

        $creditCard->setCardName($request->get('cardName'));
        $creditCard->setSecurityCode($request->get('securityCode'));
        $creditCard->setExpirationMonth($request->get('expirationMonth'));
        $creditCard->setExpirationYear($request->get('expirationYear'));
        $creditCard->setCardNumber($request->get('cardNumber'));

        $creditCard->save();

        return redirect()->route('user.show', ['id' => Auth::id()]);
    }

    public function delete($id)
    {
        CreditCard::destroy($id);

        return redirect()->route('user.show', ['id' => Auth::id()]);
    }
}
