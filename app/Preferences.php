<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'firstLogin', 'dob' ,'email', 'password', 'gender', 'preference','verifytoken'
    ];

    public $incrementing = false;
}
