<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function show($foodID)
    {
        $data = [];
        $food = Food::findOrFail($foodID);

        $data['title'] = $food->getName();
        $data['food'] = $food;

        return view('food.show')->with('data', $data);
    }

    public function showAll()
    {
        $data = Food::orderBy('id', 'DESC')->get();

        return view('food.showAll')->with('data', $data);
    }

    public function create()
    {
        $data = [];
        $data['title'] = 'Create food';

        return view('food.create')->with('data', $data);
    }

    public function update($id)
    {
        try {
            $data = Food::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('food.update')->with('data', $data);
    }

    public function updateSave(Request $request)
    {
        Food::validate($request);
        
        try {
            $food = Food::findOrFail($request->get('id'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }
        
        $food->setName($request->get('name'));
        $food->setDescription($request->get('description'));
        $food->setAvailability($request->get('availability'));
        $food->setRecipe($request->get('recipe'));
        $food->setPrice($request->get('price'));

        $food->save();

        return redirect()->route('food.show', [$request->get('id')]);
    }

    public function save(Request $request)
    {
        Food::validate($request);

        Food::create($request->only(['name', 'description', 'availability', 'recipe', 'price']));

        return back()->with('success', 'Item created successfully!');
    }

    public function delete($foodID)
    {
        $data['reviews'] = Reviews::where('food_id', $foodID)->delete();
        
        Food::destroy($foodID);

        $data = Food::orderBy('id', 'DESC')->get();

        return view('food.showAll')->with('data', $data);
    }
}
