<?php

namespace App;

use App\Notifications\adminresetpasswordnotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new adminresetpasswordnotification($token));
    }

    protected $fillable = [
        'name', 'email', 'password','verifytoken'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function isAdmin()
    {
         return $this->isAdmin();
    }


}