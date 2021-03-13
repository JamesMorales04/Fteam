<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;

    //attributes id, total, created_at, updated_at

    protected $fillable = [
        'total',
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            'total' => 'required',
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

    public function getTotal()
    {
        return $this->attributes['total'];
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
