<?php

namespace App\Services;

use App\User;
use App\Preferences;
use App\Profile;
use Illuminate\Support\Facades\Log;

//
class ProfileScorer
{
    // TODO // FIXME: user Preference model instead of user
    // User class only used for stub
    // Score a profile against a preference model of the current user
    // with specific scoring rules
    public static function score(User $user, User $prospect)
    {
        Log::debug('Score(): Scoring '.$prospect->id.' for '.$user->id);
        
        $userProfile = Profile::find($user->id);
        $prospectProfile = Profile::find($prospect->id);

        $preferences = Preferences::find($user->id);
        // out of 75 points
        $score = 0;

        //$score += ProfileScorer::scoreAge($preferences, $prospect->dob);
        $score += ProfileScorer::scoreEthnicity($preferences, $prospectProfile->ethnicity);
        $score += ProfileScorer::scoreHobbies($userProfile, $prospectProfile);
        $score += ProfileScorer::scoreInterests($userProfile, $prospectProfile);
        $score += ProfileScorer::scoreSmoking($preferences->smoking , $prospectProfile->smoking);
        $score += ProfileScorer::scoreDistance($userProfile->postcode , $prospectProfile->postcode);
        $score += ProfileScorer::scoreReligion($userProfile->religion , $prospectProfile->religion);
        
        return $score;
    }

    // possible 20
    private static function scoreAge($user, $prospect)
    {
        
        if ($user == null or $prospect ==  null) {
             Log::debug('Score(): Age: null values.. skipping');
        
            return 0;
        }
        //FIXME: dob -> date
        
        $score = 0;

        $dob = new \DateTime(date($prospect));
        $now = new \DateTime(date("Y-m-d"));
        $age = $dob->diff($now);
        

        if ( $age->y >= $user->agelower and $age->y <= $user->ageupper ) {
            $score = 20;
        } elseif ( $age->y >= ($user->agelower - 1)  and $age->y <= ($user->ageupper + 1) ) {
            $score = 10;
        } elseif ( $age->y >= ($user->agelower - 2)  and $age->y <= ($user->ageupper + 3) ) {
            $score = 7;
        } elseif ( $age->y >= ($user->agelower - 3)  and $age->y <= ($user->ageupper + 4) ) {
            $score = 5;
        }

        Log::debug('Score(): Age: '.$score);
        return $score;
    }

    // possible 10
    private static function scoreEthnicity(Preferences $user, $prospect)
    {
        if ($user == null or $prospect ==  null) {
            Log::debug('Score(): Ethnicity: null values.. skipping');
            
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

        Log::debug('Score(): Ethnicity: '.$score);
        
        return $score;
    }


    private static function buildIntArray(Profile $user){
        $interests = [];
        
        if ($user->interest1 != null)
            $interests[] = $user->interest1; 
        if ($user->interest2 != null)
            $interests[] = $user->interest2; 
        if ($user->interest3 != null)
            $interests[] = $user->interest3; 
        if ($user->interest4 != null)
            $interests[] = $user->interest4; 
        if ($user->interest5 != null)
            $interests[] = $user->interest5; 
        
        return $interests;
    }

    // possible 10
    // user and prospects are arrays of string representing interests
    private static function scoreInterests(Profile $user, Profile $prospect)
    {
        if ($user == null or $prospect == null) {
            Log::debug('Interests(): Age: null values.. skipping');
            
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

        Log::debug('Score(): Interests: '.$score);        
        return $score;
    }
    // possible 10


    private static function buildHobArray(Profile $user){
        $hobbies = [];
        
        if ($user->hobbies1 != null)
            $hobbies[] = $user->hobbies1; 
        if ($user->hobbies2 != null)
            $hobbies[] = $user->hobbies2; 
        if ($user->hobbies3 != null)
            $hobbies[] = $user->hobbies3; 
        if ($user->hobbies4 != null)
            $hobbies[] = $user->hobbies4; 
        if ($user->hobbies5 != null)
            $hobbies[] = $user->hobbies5; 

        return $hobbies;
    }

    private static function scoreHobbies($user, $prospect)
    {
        if ($user == null or $prospect == null) {
            Log::debug('Hobbies(): Age: null values.. skipping');
            
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
        
        Log::debug('Score(): Hobbies: '.$score);
        return $score;
    }

    // user and prospect both booleans
    // user boolean is true is a non smoker is ideal
    // prospect is true if they are a smoker
    private static function scoreSmoking($user, $prospect)
    {
        if ($user == null or $prospect == null) {
            Log::debug('Smoking(): Age: null values.. skipping');
            
            return 0;
        }

        $score = 0;


        if ($user and $prospect) {
            $score = -20;
        }

        Log::debug('Score(): Smoking: '.$score);
        return $score;

    }

    // possible 15

    private static function scoreDistance($user, $prospect)
    {
        if ($user == null or $prospect == null) {
            Log::debug('Distance(): Age: null values.. skipping');
            
            return 0;
        }

        $score = 0;

        $distance = 0; // FIXME: distance calcuation from long / lat

        if ($distance >= 50) {
            $score = 3;
        } elseif ($distance == 30) {
            $score = 7;
        } elseif ($distance == 20) {
            $score = 10;
        } elseif ($distance == 10) {
            $score = 15;
        }

        Log::debug('Score(): Distance: '.$score);
        return $score;
    }

    // 10
    public static function scoreReligion($user, $prospect)
    {

        if ($user == null or $prospect == null) {
            Log::debug('Religion(): Age: null values.. skipping');
            
            return 0;
        }

        $score = 0;

        if ($user == $prospect)
        {
            $score = 10;
        }

        Log::debug('Score(): Religion: '.$score);
        return $score;
    }
}