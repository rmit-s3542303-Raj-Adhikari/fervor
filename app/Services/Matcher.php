<?php


namespace App\Services;

use App\Match;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Log;

class Matcher
{

    /**
     * @param User $user user to generate matches for
     */
    public static function MatchAll(User $user)
    {

        Log::debug('MatchAll(): Match all request for user:'.$user->id);

        $prospects = User::where('id', '!=', $user->id)
            ->where('gender', '=', $user->preference)
            ->where('preference', '=', $user->gender)
            ->get();

        foreach ($prospects as $prospect) {

            Log::debug('MatchAll(): Matching for user:'.$user->id.' versus '.$prospect->id);
        
            Matcher::Match($user, $prospect);
            Matcher::Match($prospect, $user);
        }

    }

    /**
     * @param User $user
     */
    public static function UpdateAffectedMatches(User $user)
    {
        $matches = Match::where('prospect', '=', $user->id)->get();

        foreach ($matches as $match) {
            $prospect = User::find($match->user);
            Matcher::Match($prospect, $user);
        }

    }


    /**
     * @param User $user
     * @param User $prospect
     */
    public static function Match(User $user, User $prospect)
    {

        Log::debug('Match(): Matching '.$user->id.' -> '.$prospect->id);
        
        $match = null;

        $match = Match::where('user', '=', $user->id)
            ->where('prospect', '=', $prospect->id)
            ->first();

        if ($match == null) {
            Log::debug('Match(): Match '.$user->id.' -> '.$prospect->id.' does not exist... Creating new match');
        
            $match = new Match();
            $match->user = $user->id;
            $match->prospect = $prospect->id;
        }  else {
            Log::debug('Match(): Match '.$user->id.' -> '.$prospect->id.' exists ... Updating match');
            
        }

        $match->score = ProfileScorer::score($user, $prospect);


        Log::debug('Match(): Match score for '.$user->id.' -> '.$prospect->id.' = '.$match->score);
        
        $match->save();
    }
}
