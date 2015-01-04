<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('registration', function()
{
	return View::make('registration');
});
Route::post('registration', array('before' => 'csrf', function()
{
	$rules = array(
			'email'	 	=> 'required|email|unique:users',
			'password' 	=> 'required|same:password_confirm',
			'name' 		=> 'required'
		);
	$validation = Validator::make(Input::all(), $rules);
	if ($validation->fails()) {
		return Redirect::to('registration')->withErrors($validation)->withInput();
	}
	$user 				= new User;
	$user->email 		= Input::get('email');
	$user->password 	= Hash::make(Input::get('password'));
	$user->name 		= Input::get('name');
	$user->admin 		= Input::get('admin') ? 1 : 0;
	if ($user->save())
	{
		Auth::loginUsingId($user->id);
		return Redirect::to('profile');
	}
	return Redirect::to('registration')->withInput();
}));
Route::get('profile', function()
{
	if (Auth::check()) {
		return "Welcome! you have been authorized";
	} else {
		return 'Pleasee <a href="login">Login</a>';
	}
	
});
Route::get('login', function()
{
	return View::make('login');
});
Route::post('login', function(){
	$user = array(
		'email' => Input::get('email'),
		'password' => Input::get('password'));

	if (Auth::attempt($user))
	{
		return Redirect::to('profile');
	}
	return Redirect::to('login')->with('login_error', 'Could not log in.');

});
Route::get('secured', array('before' => 'auth', function()
{
	return 'This is a second page!';
}));