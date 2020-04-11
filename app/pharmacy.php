<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pharmacy extends Model
{
    protected $fillable = [
     
       'created_at',
       'name',
       'email',
       'password',
       'national_id',
       'revenue',
       'image',
       'area_id'
        
    ];
}
