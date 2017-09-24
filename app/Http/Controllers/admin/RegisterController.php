<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verifytoken' => Str::random(40),
        ]);
        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
    }
    
    protected function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }
    
    
    protected function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }
    
    protected function sendEmailDone($email,$verifytoken)
    {
        $user = User::where(['email'=>$email,'verifytoken'=>$verifytoken])->first();
        if($user) {
            return User::where(['email' => $email, 'verifytoken' => $verifytoken])->update(['status' => '1', 'verifytoken' => NULL]);
        }else{
            return 'user not found';
        }
    }

}
