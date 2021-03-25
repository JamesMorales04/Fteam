<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingredients;
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
        $user = '';
        if (Auth::user() != null) {
            $user = Auth::user()->getRole();
        }
        $data['food'] = Food::orderBy('id')->get();
        $prom = [];
        foreach ($data['food'] as $food) {
            $prom[$food->getId()] = [Reviews::where('food_id', $food->getId())->avg('rating'), $food];
            if ($prom[$food->getId()][0] == null) {
                $prom[$food->getId()][0] = 0;
            }
        }

        return view('food.showAll')->with('data', $prom)->with('user', $user);
    }

    public function create()
    {
        $data = [];
        $data['title'] = 'Create food';
        $data['ingredients'] = Ingredients::All();

        return view('food.create')->with('data', $data);
    }

    public function update($id)
    {
        try {
            $food = Food::findOrFail($id);
            $data['food'] = $food;
            $data['item'] = $food['ingredients'];
            $data['ingredients'] = Ingredients::All();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('food.update')->with('data', $data);
    }

    public function updateSave(Request $request)
    {
        Food::validate($request);

        $ingredient = [];
        foreach ($request['ingredients'] as $key) {
            array_push($ingredient, (int) $key);
        }
        $request['ingredients'] = $ingredient;

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
        $food->setIngredients(json_encode($ingredient));

        $food->save();

        return redirect()->route('food.show', [$request->get('id')]);
    }

    public function save(Request $request)
    {
        Food::validate($request);

        $ingredient = [];
        foreach ($request['ingredients'] as $key) {
            array_push($ingredient, (int) $key);
        }
        $request['ingredients'] = $ingredient;

        Food::create($request->only(['name', 'description', 'availability', 'recipe', 'price', 'ingredients']));

        return back()->with('success', 'Item created successfully!');
    }

    public function delete($foodID)
    {
        $data['reviews'] = Reviews::where('food_id', $foodID)->delete();

        Food::destroy($foodID);

        $data['food'] = Food::orderBy('id')->get();
        $prom = [];
        foreach ($data['food'] as $food) {
            $prom[$food->getId()] = [Reviews::where('food_id', $food->getId())->avg('rating'), $food];
            if ($prom[$food->getId()][0] == null) {
                $prom[$food->getId()][0] = 0;
            }
        }

        return view('food.showAll')->with('data', $prom);
    }
}
