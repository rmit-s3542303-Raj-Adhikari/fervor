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

Route::get('inbox', function () {
    return view('inbox');
});

Route::get('profile', function () {
    return view('profile');
});

Route::get('matches', function () {
    return view('match');
});






Route::get('matches', 'MatchesController@viewMatches')->name("matches");
Route::post('matches', 'MatchesController@submit')->name("submitMatch");

Auth::routes();

//For the Uploading the User Profile
Route::get('profile', 'profileController@profile');
Route::post('profile', 'profileController@update_avatar');

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@notification')->name('noti');

//Verifying the Emails
Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{verifytoken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

//Route to show all user
Route::get('ShowAllUsers','UserController@showusers');

Route::get('finduser', function()
{
    return View::make('finduser');
});

//Route for finding all users
Route::post('finduser', 'UserController@finduser');
Route::get('admin/home','AdminController@index');
Route::post('admin/home','AdminController@send')->name('admin.send');

Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@login');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('home', 'HomeController@home');



Route::get('/markAsRead',function(){
   auth()->user()->unreadNotifications->markAsRead();
});

Route::post('/addProfile', 'profileController@addProfile');

Route::post('/updatePreference', 'preferenceController@updatePreference');

Route::post('/updateUserTable', 'profileController@updateUserTable');

Route::get('profile', ['as' => 'profile', 'uses' => 'profileController@profile']);

Route::get('preference', ['as' => 'preference', 'uses' => 'preferenceController@preference']);

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'profileController@autocomplete'));

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