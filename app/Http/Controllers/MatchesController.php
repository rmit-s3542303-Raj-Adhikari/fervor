<?php

namespace App\Http\Controllers;

use App\Events\MatchRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Match;

class MatchesController extends Controller
{

    public static $SCORE_THRESHOLD = 0;

    public function viewMatches () {

        $user = User::find(Auth::id());

        $date = new \DateTime();

        $timestamp = $date->getTimestamp();

        $lastreq = $user->lastMatchRequest;

        $difference = ($timestamp - $lastreq) / 60;

        $debugmessage = array();
        $debugmessage[] = 'Last request was at '.$lastreq;
        $debugmessage[] = 'Last update was '.$difference.' minutes ago';

        if ($difference > 1){
            $user->lastMatchRequest = $timestamp;
            $user->save();
            
            event(new MatchRequest($user));
            $debugmessage[] = 'Dispatched Match Request';
        }

        $matches = Match::where('user', '=', $user->id)
            ->where('score', '>=', MatchesController::$SCORE_THRESHOLD)->get();

        $filtered = [];

        // filter the matches that score lower then the allowed threshold
        foreach ($matches as $match){
            // Retrieve the opposie match
            $oppositeMatch = Match::where('user', '=', $match->prospect)
            ->where('prospect', '=', $user->id)->first();
            
            // filter them
            if($oppositeMatch->score >= MatchesController::$SCORE_THRESHOLD)
            {
                $filtered[] = $match;
            }
        }

        return (view('match', ['debug' => $debugmessage, 'matches'=> $filtered]));
    }

}
