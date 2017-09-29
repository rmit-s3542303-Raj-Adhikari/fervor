<?php


namespace App\Services;

use App\Match;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Log;

/**
 * Class Matcher
 *
 * Matching service implementations
 * This class contains the matching routines used to
 * generate matches for users
 *
 * @package App\Services
 */
class Matcher
{

    /**
     * Match a user with all of the appropiate users in the database
     * @param User $user - User to generate matches for
     */
    public static function MatchAll(User $user)
    {

        Log::debug('MatchAll(): Match all request for user:' . $user->id);

        // Filter the matches by gender preference
        $prospects = User::where('id', '!=', $user->id)
            ->where('gender', '=', $user->preference)
            ->where('preference', '=', $user->gender)
            ->get();

        foreach ($prospects as $prospect) {

            Log::debug('MatchAll(): Matching for user:' . $user->id . ' versus ' . $prospect->id);
            // Generate the match for the prospect and user
            Matcher::Match($user, $prospect);
            Matcher::Match($prospect, $user);
        }
    }

    /**
     * Update matches where the user is the prospect
     * @param User $user to update matches for
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
     * Generate a match for two users
     * @param User $user - The User we are matching for
     * @param User $prospect - Theuser we are matching against
     */
    public static function Match(User $user, User $prospect)
    {

        Log::info('Match(): Matching ' . $user->id . ' -> ' . $prospect->id);

        $match = null;

        $match = Match::where('user', '=', $user->id)
            ->where('prospect', '=', $prospect->id)
            ->first();

        // Check if match exists already
        if ($match == null) {
            Log::debug('Match(): Match ' . $user->id . ' -> ' . $prospect->id . ' does not exist... Creating new match');
            $match = new Match();
            $match->user = $user->id;
            $match->prospect = $prospect->id;
        } else {
            Log::debug('Match(): Match ' . $user->id . ' -> ' . $prospect->id . ' already exists ... Updating match');
        }

        $match->score = ProfileScorer::score($user, $prospect);

        Log::debug('Match(): Match score for ' . $user->id . ' -> ' . $prospect->id . ' = ' . $match->score);

        $match->save();
    }
}
