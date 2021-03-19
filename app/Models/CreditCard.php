<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CreditCard extends Model
{
    use HasFactory;

    //attributes id, cardName, securityCode, created_at, updated_at, expirationYear,expiratioexpirationMonthnYear, cardNumber

    protected $fillable = [
        'cardName',
        'securityCode',
        'expirationMonth',
        'expirationYear',
        'cardNumber',
        'user_id',
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            'cardName' => 'required',

            'expirationYear' => 'required|numeric',

            'expirationMonth' => 'required|numeric',

            'securityCode' => 'required|numeric',

            'cardNumber' => 'required',

            'user_id' => 'required',
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

    public function getExpirationYear()
    {
        return $this->attributes['expirationYear'];
    }

    public function setExpirationYear($expirationYear)
    {
        $this->attributes['expirationYear'] = $expirationYear;
    }

    public function getExpirationMonth()
    {
        return $this->attributes['expirationMonth'];
    }

    public function setExpirationMonth($expirationMonth)
    {
        $this->attributes['expirationMonth'] = $expirationMonth;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
