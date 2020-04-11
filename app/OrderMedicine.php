<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

use App\Order;
use App\Medicine;
class OrderMedicine extends Model
{
    protected $fillable=[
        'quantity',
        
        'order_id',
        'medicine_id'
    ];

    public function Order(){
        return $this->belongsTo('App\Order');
    }    
    public function Medicine(){
        return $this->belongsTo('App\Medicine');
    } 
    
}
