<?php
/**
 * Created by PhpStorm.
 * User: Labib
 * Date: 14/9/17
 * Time: 11:15 AM
 */

namespace App\Http\Controllers;

use App\Location;

use App\Profile;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Image;

class profileController extends Controller
{

    public function addProfile(Request $request){



        if(profileController::profileEntryCheck() == false) {


            $profile = new Profile;

            $profile->user_id = Auth::user()->id;

            $profile->nickname = Input::get('nickname');
            $profile->location = Input::get('location');
            $profile->status = Input::get('status');
            $profile->occupation = Input::get('occupation');
            $profile->bio = Input::get('bio');
            $profile->religion = Input::get('religion');
            $profile->Ethnicity = Input::get('Ethnicity');
            $profile->height = Input::get('height');


            $profile->hobbies = Input::get('hobbies');
            $profile->hobbies2 = Input::get('hobbies2');
            $profile->hobbies3 = Input::get('hobbies3');
            $profile->hobbies4 = Input::get('hobbies4');
            $profile->hobbies5 = Input::get('hobbies5');

            $profile->interest = Input::get('interest');
            $profile->interest2 = Input::get('interest2');
            $profile->interest3 = Input::get('interest3');
            $profile->interest4 = Input::get('interest4');
            $profile->interest5 = Input::get('interest5');

            $profile->language = Input::get('language');
            $profile->language2 = Input::get('language2');
            $profile->language3 = Input::get('language3');
            $profile->language4 = Input::get('language4');
            $profile->language5 = Input::get('language5');




            $smokingcheck  = Input::get('smoking');

            if($smokingcheck === 'TRUE'){

                $smoking = TRUE;

            }else{

                $smoking = FALSE;

            }


            $profile->smoking = $smoking;






            $profile->save();

            return redirect()->route('profile');


        }else{

            $nickname = $request->get('nickname');
            $location = $request->get('location');
            $status = $request->get('status');
            $occupation = $request->get('occupation');
            $bio = $request->get('bio');
            $religion = $request->get('religion');
            $ethnicity = $request->get('Ethnicity');
            $height = $request->get('height');


            $hobbies = $request->get('hobbies');
            $hobbies2 = $request->get('hobbies2');
            $hobbies3 = $request->get('hobbies3');
            $hobbies4 = $request->get('hobbies4');
            $hobbies5 = $request->get('hobbies5');


            $interest = $request->get('interest');
            $interest2 = $request->get('interest2');
            $interest3 = $request->get('interest3');
            $interest4 = $request->get('interest4');
            $interest5 = $request->get('interest5');

            $language = $request->get('language');
            $language2 = $request->get('language2');
            $language3 = $request->get('language3');
            $language4 = $request->get('language4');
            $language5 = $request->get('language5');


            $smokingcheck  = $request->get('smoking');

            if($smokingcheck === 'TRUE'){

                $smoking = TRUE;

            }else{

                $smoking = FALSE;

            }


            $profile = Profile::where('user_id', '=', Auth::user()->id );

            $profile->update([

                'nickname' => $nickname,
                'location' => $location,
                'status'   => $status,
                'occupation' => $occupation,
                'bio' => $bio,
                'religion' => $religion,
                'Ethnicity' => $ethnicity,
                'height' => $height,
                'hobbies' => $hobbies,
                'hobbies2' => $hobbies2,
                'hobbies3' => $hobbies3,
                'hobbies4' => $hobbies4,
                'hobbies5' => $hobbies5,
                'interest' => $interest,
                'interest2' => $interest2,
                'interest3' => $interest3,
                'interest4' => $interest4,
                'interest5' => $interest5,
                'language' => $language,
                'language2' => $language2,
                'language3' => $language3,
                'language4' => $language4,
                'language5' => $language5,
                'smoking' => $smoking,

            ]);


            return redirect()->route('profile');
        }

    }


    public function updateUserTable(Request $request){

        $this->validator($request->all())->validate();

       $month = $request->get('month');
        $year = $request->get('year');
        $day = $request->get('day');

        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $gender = $request->get('gender');


        $user = USER::where('id', '=', Auth::user()->id );

        $user->update([

            'firstname' => $firstname,
            'lastname'  => $lastname,
            'gender'    => $gender,
            'dob'       => $year."-".$month."-".$day,
        ]);


        return redirect()->route('profile');
    }


    public static function profileEntryCheck(){

        $userID = Profile::where('user_id', '=', Auth::user()->id )->exists();

        if($userID == false){

            return false;

        }else{

            return true;

        }


    }




    protected function validator(array $data)
    {
        $invalidAgeRule = "";

        $dateThreshold = new DateTime(date("Y-m-d"));
        $userDate = new DateTime($data["year"]."-".$data["month"]."-".$data["day"]);

        $difference = $userDate->diff($dateThreshold);

        if($difference->y < 18)
        {
            $invalidAgeRule = "|array";
        }

        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'agecheck' => 'required'.$invalidAgeRule,
        ]);
    }



    public function autocomplete(Request $request){

        $data = Location::select("suburbs as name")->where("suburbs","LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }
    
       public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }

    //Updating the User's 'avatar' or profile picture
    
    function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		$path = public_path('img/avatar/' . $filename);
    		//Using Image 3rd party software setting the user's image and saving to db
    		Image::make($avatar)->resize(300, 300)->save($path);
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()) );

    }
    
    

}

