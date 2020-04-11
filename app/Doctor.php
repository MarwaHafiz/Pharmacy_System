<?php

namespace App;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Doctor extends Authenticatable  implements BannableContract
{
    use Notifiable;
    use Bannable;
    use HasRoles;
    protected $guard = 'doctor';

    protected $fillable = [
        'name',
        'email',
        'image', 
        'password', 
        'national_id', 
        'ban_flag', 
        'pharmacy_id',
        'banned_at'
        
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pharmacy()
      {
      
         return $this->belongsTo('App\pharmacy', 'pharmacy_id');
        }


    public function order()
    {

    }
}

