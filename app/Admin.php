<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
    {
        use Notifiable;
        use HasRoles;

        protected $guard = 'admin';

        protected $fillable = [
           'email', 'password',
        ];

    }