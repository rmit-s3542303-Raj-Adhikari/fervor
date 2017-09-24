<?php

namespace App\Http\Controllers;

use App\Events\MatchRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Match;

class MatchesController extends Controller
{
    public function viewMatches () {

        $user = User::find(Auth::id());

        $date = new \DateTime();

        $timestamp = $date->getTimestamp();

        $lastreq = $user->lastMatchRequest;

        $difference = ($timestamp - $lastreq) / 60;

        $debugmessage = array();
        $debugmessage[] = 'Last request was at '.$lastreq;
        $debugmessage[] = 'Last update was '.$difference.' minutes ago';

        if ($difference > 5){
            $user->lastMatchRequest = $timestamp;
            $user->save();
            event(new MatchRequest($user));
            $debugmessage[] = 'Dispatched Match Request';
        }

        $matches = Match::where('user', '=', $user->id)
            ->where('score', '>', 30)->get();

        return (view('match', ['debug' => $debugmessage, 'matches'=> $matches]));
    }

}
