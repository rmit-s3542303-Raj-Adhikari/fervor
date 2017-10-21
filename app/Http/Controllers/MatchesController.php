<?php

namespace App\Http\Controllers;

use App\Events\MatchRequest;
use App\Services\ProfileScorer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Match;
use App\Profile;
use App\Location;

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

    public static function returnMatches($uid){
        $matches = Match::where('user', '=', $uid)
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
                ->where('prospect', '=', $uid)
                ->first();

            // filter them
            if($oppositeMatch->score >= MatchesController::$SCORE_THRESHOLD)
            {
                $compatibility = (($oppositeMatch->score)/(75)
                        + ($match->score)/(75)) / 2;

                if  ($match->pinned) {
                    $pinned[] =  array($match, $compatibility);
                } else {
                    $filtered[] = array($match, $compatibility);
                }
            }
        }

        return ['pinned' => $pinned, 'filtered' => $filtered];
    }


    /**
     * Calculate_distance calculates the distance between two users
     * given the latitude and longitude of each user.
     * It uses the Haversine formula to calculate this distance.
     * 
     * Takes in $lat1, $long1 of the Authenticated user.
     * $lat2, $long2 of the matchee. 
     * 
     * Haversine forumla is then used to calculate the distance.
     * Mulitiplied to get the distance in forms of kilometers.
     * Returns the distance in kilometers.
    */
    public function calculate_distance($lat1, $long1, $lat2, $long2)
    {
        $theta = $long1 - $long2;
        $d = sin(deg2rad($lat2)) + cos(deg2rad($lat1)) 
        * cos (deg2rad($lat2)) * cos (deg2rad($theta));
        $d = acos($d);
        $d = rad2deg($d);
        $kilometers = $d * 60 * 1.1515 * 1.609344;
        return $kilometers;
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
            //Grab the latitude and longitude of match
            $matchedLocation = Profile::where('id', '=', $oppositeMatch->user)->get();
            $location = $matchedLocation[0]->location;
            //Go into Location table for latitude
            $find_loc = Location::where('postcode', '=', $location)->first();
            //Extract Lat + Longitude
            $lat1 = $find_loc['lat'];
            $lon1 = $find_loc['lon'];
            
            //Same process for User location
            $Userloc = Profile::where('id','=', $user->id)->get();
            $find_loc2 = Location::where('postcode', '=', $Userloc)->first();
            //Extract Lat + Longitude from Location table
            $lat2 = $find_loc2['lat'];
            $lon2 = $find_loc2['lon'];
            
            $distance = MatchesController::calculate_distance($lat1, $lon1, $lat2, $lon2);
  
                
            echo("Distance is:" + $distance + "km");
    
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
        return (view('match', ['debug' => $debugmessage, 'matches'=> $filtered, 'pinned'=> $pinned, 'distance' => $distance]));
    }

}
