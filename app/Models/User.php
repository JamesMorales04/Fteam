<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Models\CreditCard;
use App\Models\Order;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //attributes id, name, email, created_at, updated_at, address. password, role

    protected $fillable = [
        'email',
        'name',
        'address',
        'password',
        'role',
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required',

            'email' => 'required|email:rfc,dns',

            'address' => 'required',

            'password' => 'required',

            'role' => 'required',
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

    public function getAddress()
    {
        return $this->attributes['address'];
    }

    public function setAddress($address)
    {
        $this->attributes['address'] = $address;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword()
    {
        return $this->attributes['password'];
    }

    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function setRole($role)
    {
        $this->attributes['role'] = $role;
    }



    public function getCreationDate()
    {
        return $this->attributes['created_at'];
    }

    public function creditCard(){
        return $this->hasMany(CreditCard::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
