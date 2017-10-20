<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\User;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

class UserController extends Controller
{
    //
    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		$path = public_path('img/avatar/' . $filename);
    		Image::make($avatar)->resize(300, 300)->save($path);
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()) );

    }

     /**
     * Returns all users
     *
     * @return \Illuminate\View\View
     */
    function showusers()
    {
        //Getting all the users and ordering them by flagged status
        $user = User::orderBy('flagged','desc')->get();
          return view('ShowAllUsers',['user'=> $user]);
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
        return view('ShowAllUsers', ['user'=> $user]);
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
        $user = User::where('email', $req->input('email'))->get();
        //Set the selected user's flagged status to 1
        $user->flagged = 1;
        return view('ShowAllUsers', ['user'=> $user]);
    }

}