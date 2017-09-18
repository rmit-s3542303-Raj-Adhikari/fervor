<?php

namespace Services;

use App\User;


//
class ProfileScorer
{
    // TODO // FIXME: user Preference model instead of user
    // User class only used for stub
    // Score a profile against a preference model of the current user
    public static function score(User $user, User $prospect)
    {
        $score = 0;

        $score += ProfileScorer::scoreAge($user, $prospect);
        $score += ProfileScorer::scoreDistance($user, $prospect);
        $score += ProfileScorer::scoreEthnicity($user, $prospect);
        $score += ProfileScorer::scoreHobbies($user, $prospect);
        $score += ProfileScorer::scoreInterests($user, $prospect);
        $score += ProfileScorer::scoreDistance($user, $prospect);
        $score += ProfileScorer::scoreSmoking($user, $prospect);

        return $score;
    }

    // possible 20
    private static function scoreAge($user, $prospect)
    {
        if ($user == null or $prospect ==  null) {
            return 0;
        }

        $score = 0;

        $difference = abs($user - $prospect);

        if ($difference >= 3) {
            $score = 5;
        } elseif ($difference == 2) {
            $score = 7;
        } elseif ($difference == 1) {
            $score = 10;
        } elseif ($difference == 0) {
            $score = 20;
        }

            return $score;
    }

    // possible 10
    // $user is an array of allowed ethnicities
    private static function scoreEthnicity($user, $prospect)
    {
        if ($user == null or $prospect ==  null) {
            return 0;
        }

        $score = 5;

        foreach ($user as &$item) {
            if ($item == $prospect) {
                $score = 10;
            }
        }

        unset($item);

        return $score;
    }

    // possible 10
    // user and prospects are arrays of string representing interests
    private static function scoreInterests($user, $prospect)
    {
        if ($user == null or $prospect == null) {
            return 0;
        }
        $SCORE_MAX = 10;
        $score = 0;

        foreach ($user as &$uint) {
           foreach ($prospect as &$pint) {
               if ( $uint == $pint and $score < $SCORE_MAX) {
                   $score += 2;
               }
           }
        }

        unset($uint);
        unset($pint);
        
        return $score;
    }
    // possible 10

    private static function scoreHobbies($user, $prospect)
    {
        if ($user == null or $prospect == null) {
            return 0;
        }
        $SCORE_MAX = 10;
        $score = 0;

        foreach ($user as &$uhob) {
           foreach ($prospect as &$phob) {
               if ( $uhob == $phob and $score < $SCORE_MAX) {
                   $score += 2;
               }
           }
        }
        
        unset($uhob);
        unset($phob);
        
        return $score;
    }

    // user and prospect both booleans
    // user boolean is true is a non smoker is ideal
    // prospect is true if they are a smoker
    private static function scoreSmoking($user, $prospect)
    {
        if ($user == null or $prospect == null) {
            return 0;
        }

        $score = 0;


        if ($user and $prospect) {
            $score = -20;
        }

        return $score;


    }

    // possible 10

    private static function scoreDistance($user, $prospect)
    {
        if ($user == null or $prospect == null) {
            return 0;
        }

        $score = 0;

        $distance = 0; // FIXME: distance calcuation from long / lat

        if ($distance >= 50) {
            $score = 3;
        } elseif ($distance == 30) {
            $score = 5;
        } elseif ($distance == 20) {
            $score = 7;
        } elseif ($distance == 10) {
            $score = 10;
        }

        return $score;
    }

}