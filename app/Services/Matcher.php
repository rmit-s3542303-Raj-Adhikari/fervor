<?php


namespace App\Services;

use App\Match;
use App\User;
use App\Profile;


class Matcher
{

    /**
     * @param User $user user to generate matches for
     */
    public static function MatchAll(User $user)
    {
        $prospects = User::where('id', '!=', $user->id)
            ->where('gender', '=', $user->preference)
            ->where('preference', '=', $user->gender)
            ->get();

        foreach ($prospects as $prospect) {
            Matcher::Match($user, $prospect);
            Matcher::Match($prospect, $user);
        }

    }

    /**
     * @param User $user
     */
    public static function UpdateAffectedMatches(User $user)
    {
        $matches = User::where('prospect', '=', $user->id);

        foreach ($matches as $match) {
            $prospect = User::where('id', '=', $match->user)->get();
            Matcher::Match($prospect, $user);
        }

    }


    /**
     * @param User $user
     * @param User $prospect
     */
    public static function Match(User $user, User $prospect)
    {
        $match = null;

        $match = Match::where('user', '=', $user->id)
            ->where('prospect', '=', $prospect->id)
            ->get();

        if ($match == null) {
            $match = new Match();
            $match->user = $user->id;
            $match->prospect = $prospect->id;
        }

        $match->score = ProfileScorer::score($user, $prospect);

        $match->save();
    }
}
