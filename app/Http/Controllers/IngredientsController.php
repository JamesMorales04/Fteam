<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function showAll()
    {
        $data = []; //to be sent to the view
        $ingredients = Ingredients::all();
        $data['ingredients'] = $ingredients;

        return view('Ingredients.show')->with('data', $data);
    }

    public function showIngredient($id)
    {
        $data = []; //to be sent to the view
        $product = Ingredients::findOrFail($id);

        $data['title'] = $product->getName();
        $data['product'] = $product;

        return view('Ingredients.ingredient')->with('data', $data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Create Ingredient';

        return view('Ingredients.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Ingredients::validate($request);

        Ingredients::create($request->only(['id', 'name', 'price', 'amount', 'availability']));

        return back()->with('success', 'Item created successfully!');
    }

    public function delete($id)
    {
        Ingredients::where('id', $id)->delete();

        $data = []; //to be sent to the view
        $ingredients = Ingredients::all();
        $data['ingredients'] = $ingredients;

        return view('Ingredients.show')->with('data', $data);
    }

    public function update($id)
    {
        try {
            $data = Ingredients::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('Ingredients.update')->with('data', $data);
    }

    public function updateSave(Request $request)
    {
        Ingredients::validate($request);

        try {
            $food = Ingredients::findOrFail($request->get('id'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        $food->setName($request->get('name'));
        $food->setPrice($request->get('price'));
        $food->setAmount($request->get('amount'));
        $food->setAvailability($request->get('availability'));

        $food->save();

        return redirect()->route('Ingredients.show', [$request->get('id')]);
    }
}
