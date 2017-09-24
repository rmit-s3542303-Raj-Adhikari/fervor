<?php

namespace App\Services;

use App\User;
use App\Preferences;
use App\Profile;


//
class ProfileScorer
{
    // TODO // FIXME: user Preference model instead of user
    // User class only used for stub
    // Score a profile against a preference model of the current user
    // with specific scoring rules
    public static function score(User $user, User $prospect)
    {
        $userProfile = Profile::find($user->id)->get();
        $prospectProfile = Profile::find($prospect->id)->get();

        $preferences = Preferences::find($user->id);
        // out of 60 points
        $score = 0;

        $score += ProfileScorer::scoreAge($preferences->age, $prospect->dob);
        $score += ProfileScorer::scoreEthnicity($preferences, $prospectProfile->ethnicity);
        $score += ProfileScorer::scoreHobbies($preferences, $prospectProfile);
        $score += ProfileScorer::scoreInterests($preferences, $prospectProfile);
        $score += ProfileScorer::scoreSmoking($preferences->smoking , $prospectProfile->smoking);
        $score += ProfileScorer::scoreDistance($userProfile->postcode , $prospectProfile->postcode);
        
        return $score;
    }

    // possible 20
    private static function scoreAge($user, $prospect)
    {
        if ($user == null or $prospect ==  null) {
            return 0;
        }
        //FIXME: dob -> date
        
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
    private static function scoreEthnicity(Preferences $user, $prospect)
    {
        if ($user == null or $prospect ==  null) {
            return 0;
        }

        $score = 5;

        switch ($prospect) {
            case 'caucasian':
                $score = ($user->caucasian) ? 10 : 5;
                break;
            case 'hispanic':
                $score = ($user->hispanic) ? 10 : 5;
                break;
            case 'black':
                $score = ($user->black) ? 10 : 5;
                break;    
            case 'middleeast':
                $score = ($user->middleeast) ? 10 : 5;
                break;
            case 'asian':
                $score = ($user->asian) ? 10 : 5;
                break;
            case 'indian':
                $score = ($user->indian) ? 10 : 5;
                break;    
            case 'aboriginal':
                $score = ($user->aboriginal) ? 10 : 5;
                break;
            case 'islander':
                $score = ($user->islander) ? 10 : 5;
                break;
            case 'mixed':
                $score = ($user->mixed) ? 10 : 5;
                break;    

            default:
                $score = 5;
                break;
        }


        return $score;
    }


    private static function buildIntArray(Profile $user){
        $interest[] = $user->interest1; 
        $interest[] = $user->interest2; 
        $interest[] = $user->interest3; 
        $interest[] = $user->interest4; 
        $interest[] = $user->interest5; 

        return $interest;
    }

    // possible 10
    // user and prospects are arrays of string representing interests
    private static function scoreInterests(Profile $user, Profile $prospect)
    {
        if ($user == null or $prospect == null) {
            return 0;
        }
        $SCORE_MAX = 10;
        $score = 0;

        $user_interests = ProfileScorer::buildIntArray($user);
        $prospect_interests = ProfileScorer::buildIntArray($prospect);

        foreach ($user_interests as $uint) {
           foreach ($prospect_interests as $pint) {
               if ( $uint == $pint and $score < $SCORE_MAX) {
                   $score += 2;
               }
           }
        }

        return $score;
    }
    // possible 10


    private static function buildHobArray(Profile $user){
        $hobbies[] = $user->hobbies1; 
        $hobbies[] = $user->hobbies2; 
        $hobbies[] = $user->hobbies3; 
        $hobbies[] = $user->hobbies4; 
        $hobbies[] = $user->hobbies5; 

        return $hobbies;
    }

    private static function scoreHobbies($user, $prospect)
    {
        if ($user == null or $prospect == null) {
            return 0;
        }
        $SCORE_MAX = 10;
        $score = 0;

        $user_hobbies = ProfileScorer::buildHobArray($user);
        $prospect_hobbies = ProfileScorer::buildHobArray($prospect);

        foreach ($user_hobbies as $uhob) {
           foreach ($prospect_hobbies as $phob) {
               if ( $uhob == $phob and $score < $SCORE_MAX) {
                   $score += 2;
               }
           }
        }
        
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