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

    public function topThree()
    {
        $results = OrderedFood::pluck('foodName')->toArray();
        $valores = array_count_values($results);
        asort($valores);
        $res = array_slice($valores, -3, 3, true);
        $valores= array_reverse ($res,true);
        $valores = array_keys($valores);
        // dd($valores);

        return view('food.topThree')->with('data', $valores);
    }
}
