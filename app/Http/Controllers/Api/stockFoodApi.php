<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;

class StockFoodApi extends Controller
{
    public function index()
    {
        $food = Food::where('availability', 1)->get();

        return response()->json($food);
    }
}
