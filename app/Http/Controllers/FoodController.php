<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Reviews;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function show($foodID)
    {
        $data = [];
        $food = Food::findOrFail($foodID);

        $data['title'] = $food->getName();
        $data['food'] = $food;
        $data['reviews'] = Food::with("reviews")->get();

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

    public function save(Request $request)
    {
        Food::validate($request);

        Food::create($request->only(['name', 'availability', 'recipe', 'price']));

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
