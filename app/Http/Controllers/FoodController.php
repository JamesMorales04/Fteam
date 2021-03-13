<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function show($foodID)
    {
        $data = []; //to be sent to the view
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
        $data = []; //to be sent to the view
        $data['title'] = 'Create food';

        return view('food.create')->with('data', $data);
    }

    public function save(Request $request)
    {

        // echo $request;

        $request['availability'] = $request->has('availability');

        // dd($values);
        $request->validate([
            'name' => 'required',
            'availability' => 'required',
            'recipe' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);
        Food::create($request->only(['name', 'availability', 'recipe', 'price']));

        return back()->with('success', 'Item created successfully!');
    }

    public function delete($foodID)
    {
        Food::destroy($foodID);

        $data = Food::orderBy('id', 'DESC')->get();

        return view('food.showAll')->with('data', $data);
    }
}
