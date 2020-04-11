<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Doctor;
use App\OrderMedicine;
use App\Status;
use App\pharmacy;
class Order extends Model
{
    protected $fillable=[
        'is_insured',
        'action',
        'delivering_address',
        'total_price',
        'user_id',
        'doctor_id',
        'pharmacy_id',
        'status_id'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Doctor(){
        return $this->belongsTo('App\Doctor','doctor_id');
    }
    public function Status(){
        return $this->belongsTo('App\Status');
    }
    public function Pharmacy(){
        return $this->belongsTo('App\pharmacy');
    }
    
}
