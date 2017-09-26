<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 213c22da3546628738769e3c4f2761e57ed21259
use App\User;

class UserController extends Controller
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD
=======
=======

class UserController extends Controller
{
    //
>>>>>>> 213c22da3546628738769e3c4f2761e57ed21259
    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }

<<<<<<< HEAD
=======

>>>>>>> 213c22da3546628738769e3c4f2761e57ed21259
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD
=======

>>>>>>> 213c22da3546628738769e3c4f2761e57ed21259
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
<<<<<<< HEAD
=======

>>>>>>> 213c22da3546628738769e3c4f2761e57ed21259
     /**
     * Returns all users
     *
     * @return \Illuminate\View\View
     */
    function showusers()
    {
        //Making call to the sql database
        $user = User::all();
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
     *
     * @return \Illuminate\View\View
     */
    
    function flaguser($req)
    {
        $user = User::where('email', $req->input('email'))->get();
        return view();
    }
<<<<<<< HEAD
=======

>>>>>>> 213c22da3546628738769e3c4f2761e57ed21259
}