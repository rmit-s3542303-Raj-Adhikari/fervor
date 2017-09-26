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


    public function preference(){

        return view('preference');
    }





    public function updatePreference(Request $request){





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


        $ethnHinduism = $request->get('hinduism');
        $ethnChirstian = $request->get('chirstian');
        $ethnJudaism  = $request->get('judaism');
        $ethnBuddhism  = $request->get('buddhism');
        $atheistAtheist = $request->get('atheist');






        //Languages



            $ethnEnglish = $request->get('english');
            $ethnFrench= $request->get('french');
            $ethnSpanish= $request->get('spanish');
            $ethnChinese= $request->get('chinese');
            $atheistHindi= $request->get('hindi');
            $atheistArabic= $request->get('arabic');
            $atheistPersian= $request->get('persian');
            $atheistUrdu= $request->get('urdu');














            $smokingcheck  = $request->get('smoking');

            if($smokingcheck === 'TRUE'){

                $smoking = TRUE;

            }else{

                $smoking = FALSE;

            }


            $profile = Preferences::where('id', '=', 1 );

            $profile->update([



                'smoking'   => $smoking,
                'caucasian' => $ethnCaucasian,
                'hispanic'  => $ethnHispanic,
                'black'     => $ethBlack,
                'middleeast'     => $ethMiddleeast,
                'asian'     => $ethAsian,
                'indian'     => $ethIndian,
                'aboriginal'     => $ethAboriginal,
                'islander'     => $ethIslander,
                'mixed'       => $ethMixed,
                'hinduism'       => $ethnHinduism,
                'chirstian'       => $ethnChirstian,
                'judaism'       => $ethnJudaism,
                'buddhism'       => $ethnBuddhism,
                'atheist'       => $atheistAtheist,
                'english'      => $ethnEnglish,
                'french'    =>       $ethnFrench,
                'spanish'   =>   $ethnSpanish,
                'chinese'   =>  $ethnChinese,
                'hindi'    =>      $atheistHindi,
                'arabic'  =>    $atheistArabic,
                'persian'   =>   $atheistPersian,
                'urdu'      =>   $atheistUrdu,






            ]);


            return redirect()->route('preference');
        }



}