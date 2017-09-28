<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\verifyEmail;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use DB;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
    public function showResetForm(Request $request, $token = null)
    {

        //$w = bcrypt('de2104195eaca755d212d6bcadb224918278b41845c8a7c815910c54525de923');
        //$e = DB::table('password_resets')->select('email')->where('rememberToken','=',$token)->get();
        $users = DB::table('test')
            ->join('password_resets', 'test.email', '=', 'password_resets.email')
            ->join('users', 'test.email', '=', 'users.email')
            ->select('test.*', 'password_resets.token', 'users.id')
            ->get();



        Log::debug('Token is'.$users);

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function credentials(Request $request)
    {

        return $request->only(
            'email', 'password', 'password_confirmation', 'token'

        );

    }


}
