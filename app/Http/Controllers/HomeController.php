<?php

namespace App\Http\Controllers;

use App\Notifications\RepliedToThread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

use DB;
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
        return view('home');
    }

      public function home(){
    	return view('home', array('user' => Auth::user()) );
    }
    public function TC(){
        return view('TC');
    }
    public function notification()
    {
        //return $notification = DB::table('notifications')->count();
    }
}
