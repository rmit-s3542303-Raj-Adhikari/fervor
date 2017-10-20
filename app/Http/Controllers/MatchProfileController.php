<?php
/**
 * Created by PhpStorm.
 * User: Labib
 * Date: 12/10/17
 * Time: 10:59 PM
 */

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class MatchProfileController extends Controller
{



    public function matchProfile(){

        return view('matchp');
    }



    public function  parseMatchProfileDetails(Request $request){


        $ID = $request->get('MatchProfileWantToSee');

        $matchUser = User::where('id', '=', $ID)->get();

        $matchProfile = Profile::where('id', '=', $ID)->get();



        return (view('matchp', ['MatchUser' => $matchUser, 'MatchProfile' => $matchProfile]));






    }

}