<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if($user['firstLogin'])
        {
            $user['firstLogin'] = false;
            $user->save();
        }

        return view('home');
    }
    
      public function home(){
    	return view('home', array('user' => Auth::user()) );
    }
}
