<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    public function create($id)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Create comment';
        $data['food_id'] = $id;
        return view('reviews.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Reviews::validate($request);
        Reviews::create($request->only(['id', 'rating', 'comments', 'status', 'user_id', 'food_id', 'created_at', 'updated_at']));

        return back()->with('success', 'Item created successfully!');
    }

    public function delete($id)
    {
        Reviews::where('id', $id)->delete();

        // $data = []; //to be sent to the view
        // $ingredients = Comments::all();
        // $data['ingredients'] = $ingredients;
        
        $data = Food::orderBy('id', 'DESC')->get();
        return view('food.showAll')->with('data', $data);

        // return view('Comments.show')->with('data', $data);
    }
}