<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function show($foodID)
    {
        $data = [];
        $food = Food::findOrFail($foodID);
        $data['title'] = $food->getName();
        $data['reviews'] = Reviews::where('food_id', 'LIKE', "%$foodID%")->get();

        return view('reviews.showAll')->with('data', $data);
    }

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

        return back();
    }

    public function update($id)
    {
        try {
            $data = Reviews::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        return view('reviews.update')->with('data', $data);
    }

    public function updateSave(Request $request)
    {
        Reviews::validate($request);
        try {
            $reviews = Reviews::findOrFail($request->get('id'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('msg', 'Elemento no encontrado');
        }

        $reviews->setRating($request->get('rating'));
        $reviews->setComments($request->get('comments'));
        $reviews->setStatus($request->get('status'));

        $reviews->save();
        // dd($reviews);

        return redirect()->route('reviews.show', [$reviews->getFoodId()]);
    }
}
