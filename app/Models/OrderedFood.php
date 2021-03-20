<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedFood extends Model
{
    use HasFactory;

    //attributes id, amount, foodName, food_id, order_id, subTotal, created_at, updated_at
    protected $fillable = [
        'amount',
        'subTotal',
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getAmount()
    {
        return $this->attributes['amount'];
    }

    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }

    public function getSubTotal()
    {
        return $this->attributes['subTotal'];
    }

    public function setSubTotal($subTotal)
    {
        $this->attributes['subTotal'] = $subTotal;
    }

    public function getFoodName()
    {
        return $this->attributes['foodName'];
    }

    public function setFoodName($foodName)
    {
        $this->attributes['foodName'] = $foodName;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {
        $this->attributes['order_id'] = $order_id;
    }

    public function getFoodId()
    {
        return $this->attributes['food_id'];
    }

    public function setFoodId($food_id)
    {
        $this->attributes['food_id'] = $food_id;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
