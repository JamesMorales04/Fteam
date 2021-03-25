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

    public function array_combine_($keys, $values)
    {
        $result = [];
        foreach ($keys as $i => $k) {
            $result[$k][] = $values[$i];
        }

        return    $result;
    }

    public function topThree()
    {
        $foodName = OrderedFood::pluck('foodName')->toArray();
        $amount = OrderedFood::pluck('amount')->toArray();
        $valores = $this->array_combine_($foodName, $amount);
        asort($valores);
        $res = array_slice($valores, -3, 3, true);
        $valores = array_reverse($res, true);
        $valores = array_keys($valores);

        return view('food.topThree')->with('data', $valores);
    }
}
