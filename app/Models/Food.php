<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Food extends Model
{
    use HasFactory;

    //attributes id, name, description, availability, recipe, price, ingredients, created_at, updated_at
    protected $fillable = [
        'name',
        'description',
        'availability',
        'recipe',
        'price',
        'ingredients',
    ];

    protected $casts = [
        'availability' => 'boolean',
        'ingredients' => 'array',
    ];

    public static function validate(Request $request)
    {
        $request['availability'] = $request->has('availability');

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'availability' => 'required',
            'recipe' => 'required',
            'price' => 'required|numeric|gt:0',
            'ingredients' => 'required',
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

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getAvailability()
    {
        return $this->attributes['availability'];
    }

    public function setAvailability($availability)
    {
        $this->attributes['availability'] = $availability;
    }

    public function getRecipe()
    {
        return $this->attributes['recipe'];
    }

    public function setRecipe($recipe)
    {
        $this->attributes['recipe'] = $recipe;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getIngredients()
    {
        return $this->attributes['ingredients'];
    }

    public function setIngredients($ingredients)
    {
        $this->attributes['ingredients'] = $ingredients;
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    public function Ingredients()
    {
        return $this->hasMany(Ingredients::class);
    }

    public function orderedFood()
    {
        return $this->belongsTo(OrderedFood::class);
    }
}
