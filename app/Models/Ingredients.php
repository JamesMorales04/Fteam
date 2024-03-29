<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class Ingredients extends Model
{
    use HasFactory;

    //attributes id, name, price, amount, availability, deleted
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'amount',
        'availability',
        'deleted',
    ];

    public static function validate(Request $request)
    {
        $request['availability'] = $request->has('availability');

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
            'amount' => 'required|numeric|gt:0',
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

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getAmount()
    {
        return $this->attributes['amount'];
    }

    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }

    public function getAvailability()
    {
        return $this->attributes['availability'];
    }

    public function setAvailability($availability)
    {
        $this->attributes['availability'] = $availability;
    }

    public function getDeleted()
    {
        return $this->attributes['deleted'];
    }

    public function setDeleted($deleted)
    {
        $this->attributes['deleted'] = $deleted;
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function orderedFood()
    {
        return $this->belongsTo(OrderedFood::class);
    }
}
