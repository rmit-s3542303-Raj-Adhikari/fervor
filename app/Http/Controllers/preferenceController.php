<?php
/**
 * Created by PhpStorm.
 * User: Labib
 * Date: 25/9/17
 * Time: 1:48 PM
 */

namespace App\Http\Controllers;

use App\Preferences;
use Illuminate\Http\Request;

use Auth;


class preferenceController extends Controller
{


    public function preference()
    {

        return view('preference');
    }


    public function updatePreference(Request $request)
    {


        // Ethnicity
        $ethnCaucasian = $request->get('caucasian');
        $ethnHispanic = $request->get('hispanic');
        $ethBlack = $request->get('black');
        $ethMiddleeast = $request->get('middleeast');
        $ethAsian = $request->get('asian');
        $ethIndian = $request->get('indian');
        $ethAboriginal = $request->get('aboriginal');
        $ethIslander = $request->get('islander');
        $ethMixed = $request->get('mixed');


        //Religion

        $ageMin = $request->get('ageMin');
        $ageMax = $request->get('ageMax');

        $smokingcheck = $request->get('smoking');

        if ($smokingcheck === 'TRUE') {

            $smoking = TRUE;

        } else {

            $smoking = FALSE;

        }


        $profile = Preferences::where('id', '=', Auth::user()->id);

        $profile->update([


            'smoking' => $smoking,
            'caucasian' => $ethnCaucasian,
            'hispanic' => $ethnHispanic,
            'black' => $ethBlack,
            'middleeast' => $ethMiddleeast,
            'asian' => $ethAsian,
            'indian' => $ethIndian,
            'aboriginal' => $ethAboriginal,
            'islander' => $ethIslander,
            'mixed' => $ethMixed,
            'ageMin' => $ageMin,
            'ageMax' => $ageMax,


        ]);


        return redirect()->route('preference');
    }


}