<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name', 'availability', 'recipe', 'price'];
    protected $casts = [
        'availability' => 'boolean',
    ];

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
}
