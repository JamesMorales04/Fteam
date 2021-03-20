<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Reviews extends Model
{
    //attributes id, rating, comments, status, user_id, food_id, created_at, updated_at
    protected $fillable = [
        'id',
        'status',
        'rating',
        'comments',
        'user_id',
        'food_id',
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            'rating' => 'required|numeric|gt:0|max:5',
            'comments' => 'required',
            'user_id' => 'required',
            'food_id' => 'required',
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating)
    {
        $this->attributes['comments'] = $rating;
    }

    public function getComments()
    {
        return $this->attributes['comments'];
    }

    public function setComments($desc)
    {
        $this->attributes['comments'] = $desc;
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setStatus($stat)
    {
        $this->attributes['status'] = $stat;
    }

    public function getFoodId()
    {
        return $this->attributes['food_id'];
    }

    public function setFoodId($fId)
    {
        $this->attributes['food_id'] = $fId;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($uId)
    {
        $this->attributes['user_id'] = $uId;
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
