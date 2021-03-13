<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedFood extends Model
{
    use HasFactory;

    //attributes id, amount, price, created_at, updated_at
    protected $fillable = ['amount', 'subTotal'];

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
}
