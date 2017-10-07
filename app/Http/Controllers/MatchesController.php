<?php

namespace App\Http\Controllers;

use App\Events\MatchRequest;
use App\Services\ProfileScorer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Match;

class MatchesController extends Controller
{

    public static $SCORE_THRESHOLD = 0;

    public function submit(Request $req)
    {
        $match = Match::find($req->match);

        if ( $req->action == "dismiss") {
            $match->active = false;
        } elseif ($req->action == "pin" ){
            $match->pinned = ($match->pinned) ? false : true ;
        }

        $match->save();

        return redirect("matches");
    }

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
            ->where('active', '=', 1)
            ->where('score', '>=', MatchesController::$SCORE_THRESHOLD)
            ->orderBy('score', 'desc')
            ->get();

        $filtered = [];
        $pinned = [];

        // filter the matches that score lower then the allowed threshold
        foreach ($matches as $match){
            // Retrieve the opposite match
            $oppositeMatch = Match::where('user', '=', $match->prospect)
            ->where('prospect', '=', $user->id)
            ->first();
            
            // filter them
            if($oppositeMatch->score >= MatchesController::$SCORE_THRESHOLD)
            {
                $compatibility = (($oppositeMatch->score)/(75)
                    + ($match->score)/(75)) / 2;

                if  ($match->pinned) {
                    $pinned[] = array($match, $compatibility);
                } else {
                    $filtered[] = array($match, $compatibility);
                }
            }
        }

        return (view('match', ['debug' => $debugmessage, 'matches'=> $filtered, 'pinned'=> $pinned]));
    }

}
