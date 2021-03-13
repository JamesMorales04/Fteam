<?php

namespace App\Http\Controllers;

use App\Models\OrderedFood;

class OrderedFoodController extends Controller
{
    public function show($orderedFoodID)
    {
        $data = OrderedFood::findOrFail($orderedFoodID);

        return view('orderedFood.show')->with('data', $data);
    }

    public function showAll()
    {
        $data = OrderedFood::orderBy('id', 'DESC')->get();

        return view('orderedFood.showAll')->with('data', $data);
    }

    public function delete($orderedFoodID)
    {
        OrderedFood::destroy($orderedFoodID);

        $data = OrderedFood::orderBy('id', 'DESC')->get();

        return view('orderedFood.showAll')->with('data', $data);
    }
}
