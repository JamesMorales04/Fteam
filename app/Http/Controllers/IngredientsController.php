<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function show()
    {
        $data = []; //to be sent to the view
        $ingredients = Ingredients::all();
        $data['ingredients'] = $ingredients;

        return view('Ingredients.show')->with('data', $data);
    }

    public function showI($id)
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
        $data['title'] = 'Create product';

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
}
