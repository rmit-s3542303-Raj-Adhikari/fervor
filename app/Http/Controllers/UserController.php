<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\User;
use App\Preferences;
use App\Profile;
use Illuminate\Support\Facades\DB;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

class UserController extends Controller
{
    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }

     /**
     * Returns all users. Flagged users at the top,
     * via descending order.
     *
     * @return \Illuminate\View\View
     */
    function showusers()
    {
        //Getting all the users and ordering them by flagged status
        $user = User::orderBy('flagged','desc')->get();
          return view('showallusers',['user'=> $user]);
    }
     /**
     * Returns a specified user 
     * Searched via user email
     *
     * @return \Illuminate\View\View
     */
    
     function finduser(Request $req)
    {
        $this->validate($req,[
            'email' => 'email|required'
        ]);
        $user = User::where('email', $req->input('email'))->get();
        return view('showallusers',['user'=> $user]);
    
    }
     /**
     * Admin Functionality to flag a user
     * Gets the model of the requested user.
     * Then sets it's flagged status to 1.
     * Afterwards, returns view of all users.
     * @return \Illuminate\View\View
     */
    
    function flaguser(Request $req)
    {
         $this->validate($req,[
            'email' => 'email|required'
        ]);
        $user = User::where('email', $req->input('email'))->get();
        //Enter the collection to set user's flagged status to flagged
         $user[0]->flagged = 1; 
         $user[0]->save();
         return redirect('showallusers');
    }

    
    /**
     * Admin Functionality to ban a user.
     * Gets the model of the requested user.
     * Then removes the user from the database.
     * Afterwards, returns all users again.
     * @return \Illuminate\View\View
     */
      function banuser(Request $req)
    {
        $user = User::where('email', $req->input('email'))->get();
        
        //Remove the user from the database.
        $primaryid = $user[0]->id;
        $del_Pref = Preferences::where('id', $primaryid)->get();
        $del_Pref[0]->delete();
        //Delete User data from Profile table.
        $dProfile = Profile::where('id', $primaryid)->get();
        $dProfile[0]->delete();
        //At the end delete from user table
        $user[0]->delete();
        return redirect('showallusers');
    }
    
      /**
     * Admin Functionality to view user profile
     * @return \Illuminate\View\View
     */
    function viewprofile(Request $request)
    {
        
        $id = $request->get('UserProfileforAdmin');
        $matchUser = User::where('id', '=', $id)->get();
        $matchedProfile = Profile::where('id','=', $id)->get();
        
        return (view('adminview', ['MatchUser' => $matchUser,'MatchProfile' => $matchedProfile]));
    }
}