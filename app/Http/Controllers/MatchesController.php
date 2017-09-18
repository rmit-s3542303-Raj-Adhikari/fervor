<?php

namespace App\Http\Controllers;

use App\Events\MatchRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchesController extends Controller
{
    public function viewMatches () {

        $date = new \DateTime();

        $timestamp = $date->getTimestamp();

        $lastreq = Auth::user()['lastMatchRequest'];

        $difference = ($timestamp - $lastreq) / 60;


        if ($difference > 5){
            event(new MatchRequest(User::find(Auth::id())));
        }

        return ('matches');
    }
}
