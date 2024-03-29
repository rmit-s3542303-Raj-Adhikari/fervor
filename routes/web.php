<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('inbox', "ChatController@loadInbox")->name('inbox');
Route::middleware('auth')->get('inbox/{rid}', "ChatController@getchatview")->name('loadmsg');

Route::get('profile', function () {
    return view('profile');
});



Route::get('matches', function () {
    return view('match');
});




Route::get('matchp', 'MatchProfileController@matchProfile');
Route::post('/matchprofile', 'MatchProfileController@parseMatchProfileDetails');
//Admin Viewing user profile
Route::post('/viewprofile', 'UserController@viewprofile');



//Route::middleware('auth')->get('matchProfile', 'MatchProfileController@matchProfile');
//Route::post('matchProfile', 'MatchProfileController@parseMatchProfileDetails');



Route::middleware('auth')->get('matches', 'MatchesController@viewMatches')->name("matches");
Route::middleware('auth')->post('/matchesprofile', 'MatchesController@submit')->name("submitMatch");



Auth::routes();

//For the Uploading the User Profile
Route::middleware('auth')->get('profile', 'profileController@profile');
Route::middleware('auth')->post('profile', 'profileController@update_avatar');

Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->get('/TC', 'HomeController@TC')->name('TC');
//Verifying the Emails
Route::middleware('auth')->get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::middleware('auth')->get('verify/{email}/{verifytoken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

//Admin details
Route::middleware('auth:admin')->get('finduser', function()
{
    return View::make('finduser');
});

Route::middleware('auth:admin')->post('finduser', 'UserController@finduser');
Route::get('admin/home','AdminController@index');
Route::post('admin/home','AdminController@send')->name('admin.send');


Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@login');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('home', 'HomeController@home');

Route::middleware('auth:admin')->post('flaguser','UserController@flaguser');
Route::middleware('auth:admin')->post('banuser','UserController@banuser');


Route::middleware('auth')->post('/addProfile', 'profileController@addProfile');

Route::get('/markAsRead',function(){
   auth()->user()->unreadNotifications->markAsRead();
});

Route::middleware('auth')->post('/updatePreference', 'preferenceController@updatePreference');

Route::middleware('auth')->post('/updateUserTable', 'profileController@updateUserTable');

Route::middleware('auth')->get('profile', ['as' => 'profile', 'uses' => 'profileController@profile']);

Route::middleware('auth')->get('preference', ['as' => 'preference', 'uses' => 'preferenceController@preference']);

Route::middleware('auth')->get('autocomplete',array('as'=>'autocomplete','uses'=>'profileController@autocomplete'));

Route::middleware('auth:admin')->get('showallusers', ['as' => 'showallusers', 'uses' => 'UserController@showusers']);

Route::middleware('auth:admin')->post('finduser', ['as' => 'finduser', 'uses' => 'UserController@finduser']);



Route::get('/chat',[
   'uses' => 'ChatController@getchatview',
    'as' => 'chat',
    'middleware' => 'auth'
]);
Route::post('/creatpost',[
    'uses' => 'ChatController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);


