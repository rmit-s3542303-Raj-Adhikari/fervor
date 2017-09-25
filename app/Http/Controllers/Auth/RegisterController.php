<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\User;
use App\Preferences;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DateTime;
use Illuminate\Support\Str;
use Mail;
use App\Mail\verifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required',
            'preference' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'agecheck' => 'required'.$invalidAgeRule,
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status','Registered! but verify your email to activate your account');
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verifytoken' => Str::random(40),
            'gender' => $data['gender'],
            'preference' => $data['preference'],
            'dob' => $data["year"]."-".$data["month"]."-".$data["day"],
        ]);


        $thisUser = User::findOrFail($user->id);

        Preferences::create([
            'id' => $user->id,
        ]);

        Profile::create([
            'id' => $user->id,
        ]);

        if (env('sendmail') == true)
        {
            $this->sendEmail($thisUser);           
        }
        
        return $user;

    }
    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }
    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }
    public function sendEmailDone($email,$verifytoken)
    {
        $user = User::where(['email'=>$email,'verifytoken'=>$verifytoken])->first();
        if($user) {
            return User::where(['email' => $email, 'verifytoken' => $verifytoken])->update(['status' => '1', 'verifytoken' => NULL]);
        }else{
            return 'user not found';
        }
    }

}
