<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = [
        'order_id',
        'image',
        'user_address_id',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function user_address()
    {
        return $this->belongsTo('App\UserAddresses');
    }
}
