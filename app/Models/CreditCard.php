<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CreditCard extends Model
{
    use HasFactory;

    //attributes id, cardName, securityCode, created_at, updated_at, expirationDate. cardNumber

    protected $fillable = [
        'cardName',
        'securityCode',
        'expirationDate',
        'cardNumber',
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            'cardName' => 'required',

            'expirationDate' => 'required',

            'securityCode' => 'required|numeric',

            'cardNumber' => 'required|numeric',
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

    public function getCardName()
    {
        return $this->attributes['cardName'];
    }

    public function setCardName($cardName)
    {
        $this->attributes['cardName'] = $cardName;
    }

    public function getExpirationDate()
    {
        return $this->attributes['expirationDate'];
    }

    public function setExpirationDate($expirationDate)
    {
        $this->attributes['expirationDate'] = $expirationDate;
    }

    public function getSecurityCode()
    {
        return $this->attributes['securityCode'];
    }

    public function setSecurityCode($securityCode)
    {
        $this->attributes['securityCode'] = $securityCode;
    }

    public function getCardNumber()
    {
        return $this->attributes['cardNumber'];
    }

    public function setCardNumber($cardNumber)
    {
        $this->attributes['cardNumber'] = $cardNumber;
    }

    public function getRegisterDate()
    {
        return $this->attributes['created_at'];
    }
}
