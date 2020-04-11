<?php

namespace App;
use App\User;
use App\Area;

use Illuminate\Database\Eloquent\Model;

class UserAddresses extends Model
{
    protected $fillable = [
        'street_name',
        'building_number',
        'floor_number',
        'flat_number',
        'is_main',
        'area_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
