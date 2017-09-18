<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Match extends Model
{
    use Notifiable;
    //

    protected $fillable = [
        'user', 'prospect','score','active', 'pinned'
    ];
}
